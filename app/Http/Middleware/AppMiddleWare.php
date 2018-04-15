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
        return $next($request);
        $num_users = count(\App\User::all());
        if ($num_users == 0) {
            return redirect()->route('config');
        } else if (Auth::check()) {
            return $next($request);
        } else {
            $errors = new MessageBag(['title' => 'Bạn chưa đăng nhập vào hệ thống']);
            return redirect()->route('login')->withErrors($errors);
        }
    }
}
