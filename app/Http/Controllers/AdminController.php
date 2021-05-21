<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;

class AdminController extends Controller
{
    //
    public function index() {
        $movie = new Movie();
        $data = $movie->getRevenueByMovie();
        $detailRevenue = $movie->getDetailRevenueByMovie();
        return view('admin.trangchu',compact('data','detailRevenue'));
    }

}
