<?php

namespace App\Http\Controllers\auth;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Mail;
class CustomerLoginController extends Controller
{
    //
    public function Login() {
        return view("index.auth.login");
    }

    public function postLogin(Request $request) {
        $data = $request->except('_token');
        if (Auth::attempt($data) && Auth::user()->active == 1) {
            return redirect()->route("index.home.get");
        } else {
            return redirect()->route('index.login.get');
        }
    }

    public function getLogout() {
        Auth::logout();
        return redirect()->back();
    }

    public function getRegister() {
        return view("index.auth.register");
    }

    public function postRegister(Request $request) {
        $user = new User();
        $user->name = $request->username;
        $user->email = $request->email;
        $user->password= bcrypt($request->password);
        $user->phone = $request->phone;
        $user->save();
        Mail::send('index.emails.mailfb',['link'=>'http://127.0.0.1:8000/confirm/'.$request->email],function ($m) use ($request){
	        $m->to($request->email)->subject('Register successfully!');
	    });
        return redirect()->route("index.home.get");
    }

    public function confirm($email){
        $user = User::where('email', $email)->first();
        if($user){
            $user->active = 1;
            $user->save();
            return Redirect::to('http://127.0.0.1:8000');
        }else{
            return Redirect::to('http://127.0.0.1:8000');
        }
    }

    public function getSendcode(){
        return view("index.auth.sendcode");
    }

    public function postSendcode(Request $request){
        $code = rand(100000,999999);
        Mail::send('index.emails.code',['code'=>$code],function ($m) use ($request){
	        $m->to($request->email)->subject('Reset password code!');
	    });
        session(['verify_code' => $code]);
        session(['verify_email' => $request->email]);
        return redirect()->route("index.verify.get");
    }

    public function getVerify(){
        return view("index.auth.verify");
    }

    public function postVerify(Request $request){
        $code = session('verify_code');
        session()->forget('verify_code');
        if($code== $request->code){
            return redirect()->route("index.reset.get");
        }
    }

    public function getReset(){
        return view("index.auth.reset");
    }

    public function postReset(Request $request){
        $email = session('verify_email');
        session()->forget('verify_email');
        $user = User::where('email', $email)->first();
    
        $user->password = bcrypt($request->newPassword);
        $user->save();
        return redirect()->route("index.home.get");
    }

}
