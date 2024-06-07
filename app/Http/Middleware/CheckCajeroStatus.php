<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckCajeroStatus
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::guard('cajero')->check()) {
            $cajero = Auth::guard('cajero')->user();
            if ($cajero->mypime->status == 'inactivo' || $cajero->status == 'inactivo') {
                Auth::guard('cajero')->logout();
                return redirect('cajero-login')->withErrors(['error' => 'Cuenta inactiva']);
            }
        }

        return $next($request);
    }
}
