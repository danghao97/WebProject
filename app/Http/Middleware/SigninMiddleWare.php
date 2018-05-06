<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\MessageBag;
use Closure;

class SigninMiddleWare
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
            return redirect()->route('Config')->withErrors($errors);
        } else if (!Auth::check()) {
            return $next($request);
        } else {
            return redirect()->route('/');
        }
    }
}
