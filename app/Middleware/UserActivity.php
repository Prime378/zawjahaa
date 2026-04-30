<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class UpdateUserActivity
{
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {

            Auth::user()->update([
                'last_seen' => now(),
                'is_online' => 1
            ]);

        }

        return $next($request);
    }
}