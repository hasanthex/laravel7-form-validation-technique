<?php

namespace App\Http\Middleware;

use Closure;
use Auth;


class User
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
        
        if(Auth::user()->role == 1){
            return redirect()->route('admin');
        }

        if(Auth::user()->role == 2){
            return redirect()->route('manager');
        }

        if(Auth::user()->role == 3){
            return $next($request);
        }
        abort(403);
    }
}
