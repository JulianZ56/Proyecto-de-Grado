<?php

namespace App\Http\Middleware;

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

        switch ($guard) {
            
            case 'solicitante':
                if (Auth::guard($guard)->check()) {
                    return redirect()->route('solicitante.inicio.login');
                }
                break;
             case 'empleado':
                if (Auth::guard($guard)->check()) {
                    return redirect()->route('empleado.inicio.login');
                }
                break;

                case 'empleadojefe':
                if (Auth::guard($guard)->check()) {
                    return redirect()->route('empleadojefe.inicio.login');
                }
                break;    
            
            default:
                 if (Auth::guard($guard)->check()) {
                    return redirect()->route('superuser.inicio.login');
                 }
                break;
        }


        return $next($request);
    }
}
