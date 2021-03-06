<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
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
//        dd(Auth::user()->role);
        if(  Auth::guest() || (Auth::check() && Auth::user()->role !== 0 && Auth::user()->role !== 0)) {
            return redirect('/logout');
        } else return $next($request);
    }
}
