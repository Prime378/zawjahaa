<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;
use Illuminate\Console\Scheduling\Schedule;

class Kernel extends HttpKernel
{
    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\UpdateUserOnlineStatus::class,
            \App\Http\Middleware\UpdateUserActivity::class,
            \App\Http\Middleware\TrackVisitor::class,
        ],
    ];

    protected $routeMiddleware = [

    'admin' => \App\Http\Middleware\AdminMiddleware::class,
    ];

    protected function schedule(Schedule $schedule)
    {
        $schedule->command('users:mark-offline')->everyMinute();
    }
}