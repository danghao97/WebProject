<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\MessageBag;

class AppController extends Controller
{
    public function __construct() {
        $this->middleware('AppMiddleWare');
    }

    public function Home() {
        $user = Auth::user();
        $friends = $user->Friends;
        return view('Pages.Home', ['user' => $user, 'friends' => $friends]);
    }

    public function JSon() {
        return '{["aa":12]}';
    }

    public function Signout() {
        $signin = redirect()->route('signin');
        if (!Auth::check()) {
            $errors = new MessageBag(['title' => 'Bạn chưa đăng nhập vào hệ thống']);
            return $signin->withErrors($errors);
        }
        Auth::logout();
        return $signin;
    }
}
