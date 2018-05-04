<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\MessageBag;
use Closure;

class AppMiddleWare
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $num_users = count(\App\User::all());
        if ($num_users == 0) {
            $errors = new MessageBag(['title' => 'Bạn chưa có tài khoản quản trị nào, hãy tạo ngay']);
            return redirect()->route('config')->withErrors($errors);
        } else if (Auth::check()) {
            return $next($request);
        } else {
            $errors = new MessageBag(['title' => 'Bạn chưa đăng nhập vào hệ thống']);
            return redirect()->route('signin')->withErrors($errors);
        }
    }
}
