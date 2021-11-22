<?php

namespace App\Http\Middleware;

use Closure;

class Localization
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
        if (request()->session()->has('ln')) {
            app()->setLocale(request()->session()->get('ln'));
        } else {
            request()->session()->put('ln', 'lt');
            app()->setLocale(request()->session()->get('ln'));
        }
        return $next($request);
    }
}
