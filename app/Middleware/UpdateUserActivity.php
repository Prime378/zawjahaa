<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class UpdateUserActivity
{
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {

            $user = Auth::user();
            $user->last_seen = now();
            $user->save();

        }

        return $next($request);
    }
}