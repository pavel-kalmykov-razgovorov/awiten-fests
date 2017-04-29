<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class OnlyForAdmins
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
      if(Auth::guard('web')->check()){
        return redirect('/noPermision');
      }else if(Auth::guard('admin')->guest()){
        return redirect('/login');
      }
        return $next($request);
    }
}
