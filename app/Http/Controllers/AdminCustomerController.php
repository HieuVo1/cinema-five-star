<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AdminCustomerController extends Controller
{
    //
    public function getList() {
        $customers = User::all()->toArray();
        return view("admin.user.list",compact('customers'));
    }
}
