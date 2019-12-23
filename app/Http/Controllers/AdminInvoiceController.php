<?php

namespace App\Http\Controllers;

use App\Invoice;
use App\Invoice_detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminInvoiceController extends Controller
{
    //
    public static function convertIdInvoice($id) {
        $str_invoice = "HD";
        for ($i = 1; $i <= 7-strlen($id); $i++)
            $str_invoice .= "0";
        $str_invoice .= $id;
        return $str_invoice;
    }

    public function getList() {
        $invoices= DB::table('invoices')
        ->join('users','invoices.user_id','=','users.id')
        ->select('invoices.*','users.name as name')
        ->get();
        return view("admin.invoice.list", compact('invoices'));
    }

    public function postAjaxStatus(Request $request) {
        if ($request->ajax()) {
            $id = $request->id;
            $invoice = Invoice::find($id);
            $invoice->status = 1;
            $invoice->save();
        }
    }
}
