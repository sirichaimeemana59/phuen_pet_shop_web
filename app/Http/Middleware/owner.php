<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Owner
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
        if(Auth::guest() || (Auth::check() && Auth::user()->role !== 2 && Auth::user()->role !== 2)) {
            return redirect('/logout');
        } else return $next($request);
    }
}
