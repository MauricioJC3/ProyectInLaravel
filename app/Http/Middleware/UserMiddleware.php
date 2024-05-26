<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class UserMiddleware
{

    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check())
        {
         if(Auth::user()->is_role == 0)
         {
            return $next($request);
         }else {
          Auth::logout();
          return redirect(url('login'));
         }

        }else
        {
          Auth::logout();
          return redirect(url('login'));
        }
    }

}
