<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        if(isset($guard)) {
            if (Auth::guard($guard)->check() && $guard === 'admin') {
                return redirect(RouteServiceProvider::ADMIN_HOME);
            } elseif (Auth::guard($guard)->check() && $guard === 'patient') {
                return redirect(RouteServiceProvider::PATIENT_HOME);
            }
        }
        return $next($request);
    }
}
