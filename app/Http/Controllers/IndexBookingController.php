<?php

namespace App\Http\Controllers;

use App\Plan_cinema;
use App\Product;
use App\SP;
use App\Type_seat;

class IndexBookingController extends Controller
{
    //
    protected function convertCurrency($amount, $from_currency, $to_currency)
    {
//        $apikey = 'your-api-key-here';

        $from_Currency = urlencode($from_currency);
        $to_Currency = urlencode($to_currency);
        $query = "{$from_Currency}_{$to_Currency}";

        $json = file_get_contents("https://free.currencyconverterapi.com/api/v6/convert?q={$query}&compact=y");
        $obj = json_decode($json, true);

//        $val = floatval($obj["$query"]);

        $val = floatval($obj['VND_USD']['val']);
        $total = $val * $amount;
        return number_format($total, 3, '.', '');
    }

    public function getBooking($id, $date)
    {
        $find_plan = SP::checkPlanCinema($id)[0]->find_plan;
        if ($find_plan == 1) {
            $plan_cinema = Plan_cinema::find($id);
            $tickets = Plan_cinema::getSeatsBookedByPlan([$id]);
            $type_seats = Type_seat::all();
            $view_room = SP::getViewByPlan($plan_cinema->id)[0];
            $products = Product::where('show_booking', 1)->get();
            return view('index.booking.booking', compact('plan_cinema', 'tickets', 'type_seats', 'view_room', 'products'));
        }
        return redirect()->route("index.404.get");
    }

    public function after_booking() {
        return view("index.booking.after_payment");
    }
}
