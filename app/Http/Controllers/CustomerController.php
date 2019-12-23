<?php

namespace App\Http\Controllers;

use App\Invoice;
use App\Invoice_detail;
use App\Plan_cinema;
use App\Province;
use App\SP;
use App\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    //

    public function index() {
        return view('index.trangchu');
    }

    public function getInvoiceList() {
        $invoices = Invoice::where('user_id',Auth::user()->id)->orderBy("id","DESC")->get();
        return view("index.user.invoice.list", compact('invoices'));
    }

    public static function convertIdInvoice($id) {
        $str_invoice = "HD";
        for ($i = 1; $i <= 7-strlen($id); $i++)
            $str_invoice .= "0";
        $str_invoice .= $id;
        return $str_invoice;
    }

    public function getInvoiceDetail($id) {
        $invoice = Invoice::where('id',$id)->where('user_id',Auth::user()->id)->get();
        if (count($invoice) != 0) {
            $invoice = Invoice::where('id',$id)->where('user_id',Auth::user()->id)->first();
            $tickets = Ticket::where('invoice_id',$id)->get();
            $plan_cinema = SP::getFullInfoPlan($tickets[0]->plan_cinema_id)[0];
            $products = Invoice_detail::where("invoice_id",$id)->get();
            return view("index.user.invoice.detail", compact('invoice', 'tickets', 'plan_cinema','products'));
        } else {
            return redirect()->route('index.404.get');
        }
    }

    public function getProfile() {
        $provinces = Province::all();
        return view("index.user.profile.profile", compact('provinces'));
    }
}
