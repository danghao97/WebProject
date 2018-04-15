<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;

class ConfigController extends Controller
{
    public function __construct() {
        $this->middleware('ConfigMiddleWare');
    }

    public function Config() {
        return view('pages.config');
    }

    public function Save(Request $req) {
        $user = new \App\User();
        $user->fullname = $req->fullname;
        $user->email = $req->email;
        $user->username = $req->username;
        $user->password = bcrypt($req->password);
        $user->birthday = '';
        $user->gender = 'Nam';
        $user->friendnums = '0';
        $user->idfriend = '0';
        $user->save();
        $errors = new MessageBag(['title' => 'Đã tạo tài khoản quản trị hãy đăng nhập bằng tài khoản vừa tạo']);
        return redirect()->route('login')->withErrors($errors);
    }
}
