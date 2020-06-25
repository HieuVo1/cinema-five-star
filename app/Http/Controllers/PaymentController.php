<?php

namespace App\Http\Controllers;

use App\Invoice;
use App\Invoice_detail;
use App\Payment;
use App\Plan_cinema;
use App\Product;
use App\Services\PayPalService as PayPalSvc;
use App\Ticket;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    private $paypalSvc;

    public function __construct(PayPalSvc $paypalSvc)
    {
//        parent::__construct();
        $this->paypalSvc = $paypalSvc;
    }

    protected function convertCurrency($amount, $from_currency = "VND", $to_currency = "USD")
    {
//         $apikey = '120b7cb5ad70a8ea7ed0';

//         $from_Currency = urlencode($from_currency);
//         $to_Currency = urlencode($to_currency);
//         $query = "{$from_Currency}_{$to_Currency}";

//         $json = file_get_contents("https://free.currconv.com/api/v7/convert?q=$query&compact=ultra&apiKey=$apikey");
//         $obj = json_decode($json, true);

// //        $val = floatval($obj["$query"]);

//         $val = floatval($obj['VND_USD']['val']);
//         $total = $val * $amount;
//         echo number_format($total, 2, '.', '');
//         die;
       return $amount/23000;
    }

    public function getPayment()
    {
        return redirect()->route("index.home.get");
    }

    public function postPayment(Request $request)
    {
        $seats = $request->booking_seats;
        $products = $request->list_product;
        $price_product = $request->input_price_product;
        $price_ticket = $request->input_price_ticket;
        $total_vnd = $request->input_price_ticket + $request->input_price_product;
        $plan_id = $request->plan_cinema;
        $room_id = $request->room_id;
        $total_usd = $this->convertCurrency($total_vnd);

        session([
            "booking.seats" => $seats,
            "booking.products" => $products,
            "booking.price_ticket" => $price_ticket,
            "booking.price_product" => $price_product,
            "booking.total_vnd" => $total_vnd,
            "booking.total_usd" => $total_usd,
            "booking.plan_id" => $plan_id,
            "booking.room_id" => $room_id,
        ]);
        $data = [
            [
                'name' => 'Booking tickets and products in CiniCinema',
                'quantity' => 1,
                'price' => $total_usd,
                'sku' => '1'
            ],
        ];
        $total = $total_usd;

        $transactionDescription = "Booking tickets movie";

        $paypalCheckoutUrl = $this->paypalSvc
            // ->setCurrency('eur')
            ->setReturnUrl(url('paypal/status'))
//             ->setCancelUrl(url('/'))
            ->setItem($data)
            // ->setItem($data[0])
            // ->setItem($data[1])
            ->createPayment($transactionDescription);

        if ($paypalCheckoutUrl) {
            return redirect($paypalCheckoutUrl);
        } else {
            return dd(['Error']);
        }
    }

    public function status()
    {
        $paymentStatus = $this->paypalSvc->getPaymentStatus();
        if ($paymentStatus != false) {
            $seats = session('booking.seats');
            $arr_seat = explode(",", $seats);

            $payment = new Payment();
//            $payment->userId = 1;
            $payment->paypalPaymentId = $paymentStatus->id;
            $payment->create_time = $paymentStatus->create_time;
            $payment->update_time = $paymentStatus->update_time;
            $payment->state = $paymentStatus->state;
//            $payment->amount = $paymentStatus->transactions[0]->amount->total;
//            $payment->currency = $paymentStatus->transactions[0]->amount->currency;
            $payment->save();

            $invoice = new Invoice();
            $invoice->total = session('booking.total_vnd');
//            $invoice->total_usd = session('booking.total_usd');
            $invoice->total_usd = $paymentStatus->transactions[0]->amount->total;
            $invoice->buy_date = date("Y-m-d");
            $invoice->employee_id = 1;
            $invoice->user_id = Auth::user()->id;
            $invoice->payment_id = $payment->id;
            $invoice->save();

            //tich diem cho user
            $products = session('booking.products');
            if ($products) {
                $arr_product = explode(",", $products);
                for ($i = 0; $i < count($arr_product) - 1; $i++) {
                    $id_product = explode("_", $arr_product[$i])[0];
                    $qty = explode("_", $arr_product[$i])[1];
                    $detail = new Invoice_detail();
                    $detail->invoice_id = $invoice->id;
                    $detail->product_id = $id_product;
                    $detail->qty = $qty;
                    $detail->price = Product::getPriceProductByID($id_product);
                    $detail->save();
                }
            }
            for ($i = 0; $i < count($arr_seat) - 1; $i++) {
                $row = substr($arr_seat[$i], 0, 1);
                $col = substr($arr_seat[$i], 1);
                $seat_id = Plan_cinema::getIDSeat($row, $col, session('booking.room_id'));
//                echo $seat_id . "-";
                $ticket = new Ticket();
                $ticket->buy_date = date("Y-m-d");
                $ticket->plan_cinema_id = session('booking.plan_id');
                $ticket->seat_id = $seat_id;
                $ticket->invoice_id = $invoice->id;
                $ticket->save();
            }
            session()->forget('booking');
            return redirect()->route("index.user.invoice.detail.get",['id'=>$invoice->id]);
//            dd(session()->all());
//            echo "thanh toan thanh cong";
//            dd($paymentStatus);
            //refund tiền khi hết ghế
//            $saleID = $paymentStatus->transactions[0]->related_resources[0]->sale->id;
//            $this->paypalSvc->getRefund($payment->amount,$saleID);
        } else {
//            echo "thanh toan that bai";
            return redirect()->route("index.home.get");
        }
    }
}
