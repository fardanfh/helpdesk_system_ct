<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     * Check for an admin session value and redirect to login if missing.
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->session()->has('admin_id')) {
            return $next($request);
        }

        return redirect()->route('login');
    }
}
