<?php

namespace App\Http\Controllers;

use App\Invoice;
use App\Invoice_detail;
use App\Movie;
use App\Plan_cinema;
use App\Product;
use App\SP;
use App\Ticket;
use App\Type_seat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestController extends Controller
{
    //
    public function index()
    {
        $movies = Movie::all();
        $plan_proj = Plan_cinema::select('type_projector_id')->where('movie_id', 1)->groupBy('type_projector_id')->get();
        return view('index.chonphim', compact('movies', 'plan_proj'));
    }

    public function index2()
    {
        return view('index.datphim.index');
    }

//    public function loadprojector(Request $request)
//    {
//        if ($request->ajax()) {
//            $id_movie = $request->movie;
//            $date = $request->date;
////            echo $id_movie;
//            $msg = "";
//            $plan_proj = Plan_cinema::select('type_projector_id')->where('movie_id', $id_movie)->where('show_date', $date)->groupBy('type_projector_id')->get();
//            foreach ($plan_proj as $detail) {
//                $msg .= "<option value='{$detail->type_projector_id}'>{$detail->type_projector->name}</option>";
//            }
//            echo $msg;
//        }
//    }

    public function loadprojector(Request $request)
    {
        if ($request->ajax()) {
            $id_movie = $request->movie;
            $date = $request->date;
//            echo $id_movie;
            $msg = "";
            $plan_proj = Plan_cinema::select('type_projector_id')->where('movie_id', $id_movie)->where('show_date', $date)->groupBy('type_projector_id')->get();
            if (count($plan_proj) == 0)
                $msg .= "";
            else
                foreach ($plan_proj as $i => $detail) {
                    if ($i == 0) {
                        $msg .= "<input onchange='loadPlan()' type=\"radio\" name=\"projector\" id=\"projector_{$detail->type_projector_id}\" value=\"{$detail->type_projector_id}\" checked>
                        <label for=\"projector_{$detail->type_projector_id}\" class=\"\">{$detail->type_projector->name}</label>";
                    } else {
                        $msg .= "<input onchange='loadPlan()' type=\"radio\" name=\"projector\" id=\"projector_{$detail->type_projector_id}\" value=\"{$detail->type_projector_id}\">
                        <label for=\"projector_{$detail->type_projector_id}\" class=\"\">{$detail->type_projector->name}</label>";
                    }
                }
            echo $msg;
        }
    }

    public function loaddatemovie(Request $request)
    {
        if ($request->ajax()) {
            $id_movie = $request->movie;
//            $id_projector = $request->projector;
            $msg = "";
            $plan = Plan_cinema::select('show_date')->where('movie_id', $id_movie)->groupBy('show_date')->get();
            $i = 0;
            if (count($plan) == 0)
                $msg .= "<h3>Hiện không có suất chiếu cho phim này</h3>";
            else {
                foreach ($plan as $detail) {
                    $day = date_format(date_create($detail->show_date), 'd');
                    $month = date_format(date_create($detail->show_date), 'm');
                    $thu = date_format(date_create($detail->show_date), 'D');
                    if ($i == 0) {
                        $msg .= "<input onchange='loadProjector()' type=\"radio\" name=\"date\" id=\"date_{$detail->show_date}\" value=\"{$detail->show_date}\" checked>
                        <label for=\"date_{$detail->show_date}\" ><span>{$day}</span>/{$month} - {$thu}</label>";
                    } else {
                        $msg .= "<input onchange='loadProjector()' type=\"radio\" name=\"date\" id=\"date_{$detail->show_date}\" value=\"{$detail->show_date}\">
                        <label for=\"date_{$detail->show_date}\" ><span>{$day}</span>/{$month} - {$thu}</label>";
                    }
                    $i++;
                }
            }
            echo $msg;
        }
    }

//    public function loaddatemovie(Request $request)
//    {
//        if ($request->ajax()) {
//            $id_movie = $request->movie;
//            $id_projector = $request->projector;
//            $msg = "";
//            $plan = Plan_cinema::select('show_date')->where('movie_id', $id_movie)->groupBy('show_date')->get();
//            foreach ($plan as $detail) {
//                $msg .= "<option value='{$detail->show_date}'>{$detail->show_date}</option>";
//            }
//            echo $msg;
//        }
//    }

//    public function loadplan(Request $request)
//    {
//        if ($request->ajax()) {
//            $id_movie = $request->movie;
//            $date = $request->date;
//            $proj = $request->projector;
////            echo $id_movie;
//            $msg = "";
////            $cinemas = DB::select("SELECT `cinemas`.`name` as `cinema_name`, `cinemas`.`id` as `cinema_id`, `rooms`.`id` as `room_id`
////FROM `rooms`, `cinemas`, `plan_cinemas`
////WHERE `rooms`.id = `plan_cinemas`.`room_id` AND`cinemas`.id = `rooms`.cinema_id
////GROUP BY `cinemas`.id");
//            $cinemas = Plan_cinema::find(1)->getCinemaGroupBy($id_movie, $proj);
//            $plan_proj = Plan_cinema::where('movie_id', $id_movie)->where('show_date', $date)->where('type_projector_id', $proj)->get();
//            foreach ($cinemas as $value) {
//                $msg .= "<p>{$value->cinema_name}</p>";
//                foreach ($plan_proj as $detail) {
//                    $count = 0;
//                    if ($detail->room->cinema_id == $value->cinema_id) {
//                        $count++;
//                        $date = date_format(date_create($detail->show_date),"Ymd");
//                        $msg .= "<p><a href='" . route("datcho", ["id" => $detail->id, "date" =>$date]) . "'>{$detail->time_begin}</a></p>";
//                    }
//                    if ($count == 0)
//                        $msg .= "<p style='padding-left: 10px'>Khong co suat chieu o rap nay</p>";
//                    else $msg .= "<br/>";
//                }
//            }
//            echo $msg;
//        }
//    }
    public function loadplan(Request $request)
    {
        if ($request->ajax()) {
            $id_movie = $request->movie;
            $date = $request->date;
            $proj = $request->projector;
            $msg = "";
//            print_r($cinemas);
            $plan_proj = Plan_cinema::where('movie_id', $id_movie)->where('show_date', $date)->where('type_projector_id', $proj)->get();
//            print_r($plan_proj);
            if (count($plan_proj) == 0)
                $msg = "";
            else {
                $cinemas = SP::find(1)->getCinemaGroupBy($id_movie, $proj, $date);
                foreach ($cinemas as $value) {
                    $msg .= "<div class=\"col-md-12\" style=\"margin-bottom: 20px\">";
                    $msg .= "<p style=\"color: #333333; font-size: 20px; font-weight: 400\">{$value->cinema_name}</p><ul>";
                    foreach ($plan_proj as $detail) {
                        if ($detail->room->cinema_id == $value->cinema_id) {
                            $date = date_format(date_create($detail->show_date), "Ymd");
                            $time = date_format(date_create($detail->time_begin), "H:i");
                            $msg .= "<li>";
                            $msg .= "<a href='" . route("datcho", ["id" => $detail->id, "date" => $date]) . "' class='btn'>{$time}</a><br/>";
                            $msg .= "<span style='font-size: 13px'>" . Plan_cinema::GetSeatNone($detail->id) . " ghế trống</span>";
                            $msg .= "</li>";
                        }
                    }
                    $msg .= "</ul></div>";
                }
            }
            echo $msg;
        }
    }

    public function listphim()
    {
//        $movies = Movie::all();
//        return view('index.listphim', compact('movies'));
//        $cinemas = DB::select("SELECT `cinemas`.`name` as `cinema_name`, `cinemas`.`id` as `cinema_id`, `rooms`.`id` as `room_id`
//FROM `rooms`, `cinemas`, `plan_cinemas`
//WHERE `rooms`.id = `plan_cinemas`.`room_id` AND`cinemas`.id = `rooms`.cinema_id
//GROUP BY `cinemas`.id");
//        $value = ['Loc Nguyen'];
//        print_r($abc = DB::select("CALL HelloWorld(?);",$value));
//        echo "<br>";
//        print_r($cinemas);
//        latest()->employee()->get();
//        $abc = new Plan_cinema();
//        $a = $abc->getHello();
//        $b = $a->first();
//        print_r($abc->getHello());
//        $abc = Plan_cinema::getHello()[0]; ///////
//        $abc = json_decode($abc)->first();
//        foreach ($a as $value)
//            echo $value->name;
//        print_r($abc);
//        echo $abc->name;
//        echo Plan_cinema::GetSeatNone(4);
//        print_r(SP::getViewByPlan(4)[0]);
//        $var1 = 1;
//        $var2 = 'data2';
//        $out1 = 0; // output 1
//        $out2 = ''; // output 2
//
//        $db = DB::connection()->getPdo();
//
//        $stmt = $db->prepare("CALL get_seat_none (?,?) ");
//
//        $stmt->bindParam(1, $var1);
//        $stmt->bindParam(2, $out1);
//
//        $stmt->execute();
//
//        $search = array();
//        //dd($stmt);
//        do {
//            $search = $stmt->fetchAll(PDO::FETCH_ASSOC);
//        } while ($stmt->nextRowset());
//
//        dd($search);
//        $plan_proj = SP::getPlanCinemaByMovie(1, '2018-10-09',2);
//        foreach ($plan_proj as $detail) {
//           echo $detail->time_begin;
//        }
//        $tickets = Plan_cinema::getSeatsBookedByPlan([1]);
//        print_r($tickets);
//        $view_room = SP::getViewByPlan(1)[0];
//        print_r($view_room);
                    $invoice = new Invoice();
            $invoice->total = 534534;
            $invoice->total_usd = 162626;
            $invoice->buy_date = date('Y-m-d');
            $invoice->employee_id = 1;
            $invoice->user_id = 123;
            $invoice->save();

//    echo $cinemas_id = SP::getInfoCinemaByRoom(1)[0]->id;
    }

    public function phim($slug, Request $request)
    {
        $movie = Movie::where('slug_name', $slug)->first();
        return view('index.phim', compact('movie'));
    }

    public function datcho($id, $date)
    {
//        echo "ngau hem";
        $plan_cinema = Plan_cinema::find($id);
        $tickets = Plan_cinema::getSeatsBookedByPlan([$id]);
        $type_seats = Type_seat::all();
        $view_room = SP::getViewByPlan($plan_cinema)[0];
//        $tickets = Ticket::where('plan_cinema_id',$id)->get();
//        $seats = Seat::where('room_id',$plan_cinema->room_id)->get();
        return view('index.datcho', compact('plan_cinema', 'tickets', 'type_seats', 'view_room'));
    }

    public function savebooking(Request $request)
    {
        if ($request->ajax()) {
            $seats = $request->seats;
            $products = $request->products;
            $arr_seat = explode(",", $seats);
//            $total = $request->total;
            $price_ticket = $request->price_ticket;
            $price_product = $request->price_product;
            $plan_id = $request->plan_id;
            $room_id = $request->room_id;
            $buy_date = date("Y-m-d");
            $invoice = new Invoice();
            $invoice->total = $price_ticket+$price_product;
            $invoice->total_usd = $this->convertCurrency($price_product+$price_ticket);
            $invoice->buy_date = $buy_date;
            $invoice->employee_id = 1;
            $invoice->user_id = Auth::user()->id;
            $invoice->save();

            if ($products) {
                $arr_product = explode(",",$products);
                for ($i = 0; $i < count($arr_product) - 1; $i++) {
                    $id_product = explode("_",$arr_product[$i])[0];
                    $qty = explode("_",$arr_product[$i])[1];
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
                $seat_id = Plan_cinema::getIDSeat($row, $col, $room_id);
//                echo $seat_id . "-";
                $ticket = new Ticket();
                $ticket->buy_date = $buy_date;
                $ticket->plan_cinema_id = $plan_id;
                $ticket->seat_id = $seat_id;
                $ticket->invoice_id = 1;
                $ticket->save();
            }
            echo "success";
        }
    }

    public function getdatcho($id)
    {
        $tickets = Ticket::where('plan_cinema_id', $id)->get();
        $arr_ticket = [];
        foreach ($tickets as $i => $detail) {
            $arr_ticket[$i] = (Plan_cinema::getSeatRowCol($detail->seat_id));
        }
        return json_encode($arr_ticket);
//        print_r($arr_ticket);
    }

    public function testjson()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.accesstrade.vn/v1/datafeeds?domain=lazada.vn",
//            CURLOPT_URL => "https://api.accesstrade.vn/v1/commission_policies?camp_id=147&month=08-2016",
//            CURLOPT_URL => "https://api.accesstrade.vn/v1/campaigns",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "Authorization: Token qrUjSzorugnQZWiaULJ_5opsdPfvgn0I",
//                "cache-control: no-cache",
//                "postman-token: 490e774b-d99a-6c41-232f-f0c03f16b719"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            echo $response;
        }
    }

    protected function convertCurrency($amount, $from_currency = "VND", $to_currency = "USD")
    {
//        $apikey = 'your-api-key-here';

        $from_Currency = urlencode($from_currency);
        $to_Currency = urlencode($to_currency);
        $query = "{$from_Currency}_{$to_Currency}";

        $json = file_get_contents("https://free.currencyconverterapi.com/api/v6/convert?q={$query}&compact=y");
        $obj = json_decode($json, true);

//        $val = floatval($obj["$query"]);

        $val = floatval($obj[$query]['val']);
        $total = $val * $amount;
        return number_format($total, 3, '.', '');
    }

    public function convert()
    {
        echo $this->convertCurrency(14.63, 'USD', 'VND');
    }
}
