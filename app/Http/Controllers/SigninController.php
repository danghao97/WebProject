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

    public function DoSignup(Request $req) {
        $checkuser = \App\User::where('username', $req->username)->first();
        if ($checkuser != null) {
            $errors = new MessageBag(['title' => 'Tên đăng nhập đã tồn tại, hãy chọn tên đăng nhập khác']);
            return redirect()->back()->withInput()->withErrors($errors);
        }
        if (!$req->hasFile('avatar')) {
            $errors = new MessageBag(['title' => 'Bạn phải chọn ảnh đại diện']);
            return redirect()->back()->withInput()->withErrors($errors);
        }
        $user = new \App\User();
        $user->fullname = $req->fullname;
        $user->email = $req->email;
        $user->username = $req->username;
        $user->password = bcrypt($req->password);
        $user->type = 0;
        $avatar = $req->file('avatar');
        $user->avatar = base64_encode(file_get_contents($avatar->getRealPath()));
        $user->save();
        $errors = new MessageBag(['title' => 'Tạo tài khoản thành công. Hãy đăng nhập bằng tài khoản vừa tạo']);
        return redirect()->route('Signin')->withErrors($errors);
    }

    public function Forgot() {
        return view('Pages.Forgot');
    }

    public function DoForgot() {

    }
}
