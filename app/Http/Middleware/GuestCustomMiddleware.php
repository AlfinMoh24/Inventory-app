<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class GuestCustomMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (session()->has('token')) {
            return redirect()->route('dashboard');
        }

        return $next($request);
    }
}
