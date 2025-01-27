<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CompanyMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->routeIs('company.login') || $request->routeIs('company.register')) {
            if (Auth::guard('company')->check()) {
                return redirect()->route('company.dashboard');
            }

            return $next($request);
        }

        if (!Auth::guard('company')->check()) {
            return redirect()->route('company.login');
        }

        return $next($request);
    }
}
