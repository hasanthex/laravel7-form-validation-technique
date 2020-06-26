<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

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
        // if user not logged in.
        if(!Auth::check()){
            return redirect()->route('login');
        }

        // if user are admin role, then pass it.
        if(Auth::user()->role == 1){
            return $next($request);
        }

        // if user are manager role, then redirect to manager url
        if(Auth::user()->role == 2){
            return redirect()->route('manager');
        }

        // if user are user role, then redirect to user url
        if(Auth::user()->role == 3){
            return redirect()->route('user');
        }
        abort(403);
    }
}
