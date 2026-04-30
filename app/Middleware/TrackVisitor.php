<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Models\VisitorLog;
use Jenssegers\Agent\Agent;

class TrackVisitor
{
    public function handle($request, Closure $next)
    {
        $agent = new Agent();

        // Browser
        $browser = $agent->browser();

        // Platform (Windows, Android, iOS, etc.)
        $platform = $agent->platform();

        // Device Type
        if ($agent->isMobile()) {
            $deviceType = 'Mobile';
        } elseif ($agent->isTablet()) {
            $deviceType = 'Tablet';
        } else {
            $deviceType = 'Desktop';
        }

        // User-Agent
        $u_agent = $request->header('User-Agent');

        // 🔥 Device Brand Detection
        $deviceName = 'Unknown';

        if (preg_match('/Samsung/i', $u_agent)) {
            $deviceName = 'Samsung';
        } elseif (preg_match('/OPPO/i', $u_agent)) {
            $deviceName = 'Oppo';
        } elseif (preg_match('/Vivo/i', $u_agent)) {
            $deviceName = 'Vivo';
        } elseif (preg_match('/Xiaomi|Mi|Redmi/i', $u_agent)) {
            $deviceName = 'Xiaomi';
        } elseif (preg_match('/Realme/i', $u_agent)) {
            $deviceName = 'Realme';
        } elseif (preg_match('/iPhone/i', $u_agent)) {
            $deviceName = 'iPhone';
        } elseif (preg_match('/iPad/i', $u_agent)) {
            $deviceName = 'iPad';
        } elseif (preg_match('/Huawei/i', $u_agent)) {
            $deviceName = 'Huawei';
        } elseif (preg_match('/Infinix/i', $u_agent)) {
            $deviceName = 'Infinix';
        } elseif (preg_match('/Tecno/i', $u_agent)) {
            $deviceName = 'Tecno';
        } elseif (preg_match('/Nokia/i', $u_agent)) {
            $deviceName = 'Nokia';
        }

        // Final Device Name
        $device = $deviceName !== 'Unknown' ? $deviceName : ($agent->device() ?: $deviceType);

        // Save Log
        VisitorLog::create([
            'user_id' => Auth::check() ? Auth::id() : null,
            'ip_address' => $request->ip(),
            'browser' => $browser,
            'device' => $device,
            'platform' => $platform,
            'visited_url' => $request->fullUrl(),
            'login_status' => Auth::check() ? 'login' : 'guest',
        ]);

        return $next($request);
    }
}