<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class tree_role
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
        if(  Auth::guest() || (Auth::check() && Auth::user()->role == 1)) {
            return redirect('/');
        } else return $next($request);
    }
}
