<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminNotLoggined
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
        if(!Session()->has('admin')){
            return redirect('/');
        }
        return $next($request);
    }
}
