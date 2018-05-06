<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\MessageBag;

class SigninController extends Controller
{
    public function __construct() {
        $this->middleware('SigninMiddleWare');
    }

    public function Signin() {
        return view('Pages.Signin');
    }

    public function DoSignin(Request $req) {
        $username = $req->username;
        $password = $req->password;
        if (Auth::attempt(['username' => $username, 'password' => $password])) {
            return redirect()->route('/');
        } else {
            $errors = new MessageBag(['title' => 'Tài khoản hoặc mật khẩu không chính xác']);
            return redirect()->back()->withInput()->withErrors($errors);
        }
    }

    public function Signup() {
        return view('Pages.Signup');
    }

    public function DoSignup() {

    }

    public function Forgot() {
        return view('Pages.Forgot');
    }

    public function DoForgot() {

    }
}
