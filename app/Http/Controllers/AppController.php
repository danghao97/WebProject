<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppController extends Controller
{
    public function __construct() {
        $this->middleware('AppMiddleWare');
    }

    public function Home() {
        return view('pages.Home');
    }
}
