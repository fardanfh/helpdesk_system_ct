<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PicMiddleware
{
    /**
     * Handle an incoming request.
     * Check for a pic session value and redirect to login if missing.
     */
    public function handle(Request $request, Closure $next)
    {
        // Allow access if PIC is logged in, or if an admin is logged in (share admin login)
        if ($request->session()->has('pic_id') || $request->session()->has('admin_id')) {
            return $next($request);
        }

        // Use the admin login page (share same credentials)
        return redirect()->route('login');
    }
}
