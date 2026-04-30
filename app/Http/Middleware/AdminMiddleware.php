<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        // Check if user is logged in
        if (!auth()->check()) {
            return redirect()->route('login');
        }
        
        // Check if user has admin role
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Access Denied - Admin Only');
        }
        
        return $next($request);
    }
}