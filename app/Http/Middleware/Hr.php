<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Hr
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth()->user()->is_admin != 1) {
            return redirect()->route('home');
        }
        if (Auth()->user()->roles->first()->name == 'super admin' || Auth()->user()->roles->first()->name == 'hr') {
            return $next($request);
        } else {
            return redirect()->route('home');
        }
    }
}
