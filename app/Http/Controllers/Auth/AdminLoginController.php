<?php

namespace App\Http\Controllers\auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    //
    public function login() {
        return view("admin.auth.login");
    }

    public function postlogin(Request $request) {
        $email = $request->email;
        $password = $request->password;
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
//            echo "ahihi ahuhu";
            return redirect()->route('cms.trangchu');
        } else {
//            echo "sai rooi cu";
            return redirect()->route('cms.trangchu');
        }
//        echo $email. " " . $password;
    }
}
