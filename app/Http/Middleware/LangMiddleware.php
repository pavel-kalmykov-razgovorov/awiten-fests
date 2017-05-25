<?php

    namespace App\Http\Middleware;

    public function handle($request, Closure $next)
    {
        if (!empty(session('lang'))) {
            \App::setLocale(session('lang'));
        }
        return $next($request);
    }