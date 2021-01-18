<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserLoggined
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(Session()->has('user')){
            return redirect('/');
        }
        return $next($request);
    }
}
