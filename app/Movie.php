<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    //
    protected $table = "movies";


    public function getRevenueByMovie(){
        return DB::table('movies')
        ->join('plan_cinemas','plan_cinemas.movie_id','=','movies.id')
        ->join('tickets','tickets.plan_cinema_id','=','plan_cinemas.id')
        ->join('invoices','invoices.id','=','tickets.invoice_id')
        ->select('movies.name','invoices.total')
        ->groupBy('movies.name')
        ->get();
    }

    
    public function getDetailRevenueByMovie(){
        return DB::table('invoices')
        ->join('invoice_details','invoice_details.invoice_id','=','invoices.id')
        ->select('invoices.total','invoices.buy_date','invoice_details.price','invoice_details.qty')
        ->groupBy('invoices.buy_date')
        ->get();
    }
}
