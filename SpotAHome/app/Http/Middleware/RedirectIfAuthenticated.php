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
        if (Auth::guard($guard)->check()) {
            return redirect('/empleado/dashboard');
        }

        if (Auth::guard($guard)->check() && $guard == 'admin') {
            return redirect('/admin/home');
        }

        if (Auth::guard($guard)->check() && $guard == 'inquilino') {
            return redirect('/inquilino/');
        }
       /* if (Auth::guard($guard)->check()) {
            return redirect('/duenos/');
        }*/

     /*
      *
      *    if (Empleado::guard($guard)->check()) {
            return redirect('/empleado/dashboard');
        }
      */

        return $next($request);
    }
}
