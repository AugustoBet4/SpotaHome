<?php

namespace App\Http\Middleware;

use App\Empleado;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check() && $guard == 'web') {
            return redirect('/home');
        }

        if (Auth::guard($guard)->check() && $guard == 'admin') {
            return redirect('/admin/home');
        }

        if(Empleado::guard($guard)->check() && $guard == 'web'){

        }

        return $next($request);
    }
}
