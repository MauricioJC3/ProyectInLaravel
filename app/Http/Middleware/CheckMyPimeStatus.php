<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckMyPimeStatus
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::guard('mypime')->check()) {
            if (Auth::guard('mypime')->user()->status == 'inactivo') {
                Auth::guard('mypime')->logout();
                return redirect('mypime-login')->withErrors(['error' => 'Cuenta inactiva']);
            }
        }

        return $next($request);
    }
}
