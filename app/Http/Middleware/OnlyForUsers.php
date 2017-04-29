<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class OnlyForUsers
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
        if(Auth::guard('admin')->check()){
          return redirect('/noPermision');
        }else if(Auth::guest()){
          return redirect('/login');
        }
        return $next($request);
    }
}
