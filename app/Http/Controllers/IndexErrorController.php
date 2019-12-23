<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexErrorController extends Controller
{
    //
    public function get404() {
        return view('index.errors.404');
    }
}
