<?php

namespace App\Http\Middleware;

use Closure;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Admin
{

    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->user()->role == 'admin') {
            return $next($request);
        }
        if (auth()->user()->role == 'seller') {
            return redirect()->intended(RouteServiceProvider::SELLER);
        } else {
            return redirect()->intended(RouteServiceProvider::HOME);
        }
    }
}
