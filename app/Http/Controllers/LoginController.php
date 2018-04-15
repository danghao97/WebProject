<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\MessageBag;

class LoginController extends Controller
{
    public function __construct() {
        $this->middleware('LoginMiddleWare');
    }

    public function Login() {
        return view('pages.Login');
    }

    public function DoLogin(Request $req) {
        $username = $req->username;
        $password = $req->password;
        if (Auth::attempt(['username' => $username, 'password' => $password])) {
            return redirect()->route('/');
        } else {
            $errors = new MessageBag(['title' => 'Tài khoản hoặc mật khẩu không chính xác']);
            return redirect()->back()->withInput()->withErrors($errors);
        }
    }
}
