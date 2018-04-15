<?php

namespace App\Http\Middleware;

use Closure;

class ConfigMiddleWare
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
            return $next($request);
        } else {
            return redirect()->route('/');
        }
    }
}
