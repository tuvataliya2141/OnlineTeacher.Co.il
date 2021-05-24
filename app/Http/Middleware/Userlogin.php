<?php

namespace App\Http\Middleware;

use Closure;

class Userlogin
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
        if(session()->get('userlogin'))
        {
            return $next($request);
        }
        return redirect()->route('login');
    }
}
