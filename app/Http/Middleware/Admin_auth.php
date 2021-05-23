<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Admin_auth
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
        if(!$request->session()->has('email')){
            $request->session()->flash('error' , 2);
            return redirect('/admin');
        }
        return $next($request);
    }
}
