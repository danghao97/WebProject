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
        $friends = Auth::user()->Friends;
        return view('pages.Home', ['friends' => $friends]);
    }
    
    public function Logout() {
        $login = redirect()->route('login');
        if (!Auth::check()) {
            $errors = new MessageBag(['title' => 'Bạn chưa đăng nhập vào hệ thống']);
            return $login->withErrors($errors);
        }
        Auth::logout();
        return $login;
    }
}
