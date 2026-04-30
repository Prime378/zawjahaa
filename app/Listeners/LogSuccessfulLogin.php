<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use App\Models\VisitorLog;

class LogSuccessfulLogin
{
    public function handle(Login $event)
    {
        $u_agent = $_SERVER['HTTP_USER_AGENT'];

        // Browser detect
        $browser = 'Other';
        if (preg_match('/MSIE/i', $u_agent)) { $browser = "Internet Explorer"; }
        elseif (preg_match('/Firefox/i', $u_agent)) { $browser = "Firefox"; }
        elseif (preg_match('/Chrome/i', $u_agent)) { $browser = "Chrome"; }
        elseif (preg_match('/Safari/i', $u_agent)) { $browser = "Safari"; }
        elseif (preg_match('/Opera/i', $u_agent)) { $browser = "Opera"; }

        // Platform detect
        $platform = 'Other';
        if (preg_match('/linux/i', $u_agent)) { $platform = 'Linux'; }
        elseif (preg_match('/macintosh|mac os x/i', $u_agent)) { $platform = 'Mac'; }
        elseif (preg_match('/windows|win32/i', $u_agent)) { $platform = 'Windows'; }

        // Device
        $device = php_uname('n');

        VisitorLog::create([
            'user_id' => $event->user->id,
            'ip_address' => request()->ip(),
            'browser' => $browser,
            'device' => $device,
            'platform' => $platform,
            'visited_url' => 'login',  // login event ka URL
            'login_status' => 'login',
        ]);
    }
}