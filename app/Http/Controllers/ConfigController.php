<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Input;

class ConfigController extends Controller
{
    public function __construct() {
        $this->middleware('ConfigMiddleWare');
    }

    public function Config() {
        return view('pages.config');
    }

    public function Save(Request $req) {
        if (!$req->hasFile('avatar')) {
            $errors = new MessageBag(['title' => 'Bạn phải chọn ảnh đại diện']);
            return redirect()->back()->withInput()->withErrors($errors);
        }
        $user = new \App\User();
        $user->fullname = $req->fullname;
        $user->email = $req->email;
        $user->username = $req->username;
        $user->password = bcrypt($req->password);
        $user->birthday = '';
        $user->gender = 'Nam';
        $user->friendnums = '0';
        // $avatar = addslashes($_FILES['avatar']['tmp_name']);
        // $user->avatar = base64_encode(file_get_contents($avatar));
        $avatar = $req->file('avatar');
        $user->avatar = base64_encode(file_get_contents($avatar->getRealPath()));
        $user->save();
        \Artisan::call('db:seed');
        $errors = new MessageBag(['title' => 'Đã tạo tài khoản quản trị hãy đăng nhập bằng tài khoản vừa tạo']);
        return redirect()->route('signin')->withErrors($errors);
    }
}
