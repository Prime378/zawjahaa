<?php
// app/Helpers/OnlineStatusHelper.php
if (!function_exists('isUserOnline')) {
    function isUserOnline($user)
    {
        if (!$user || !$user->last_activity) {
            return false;
        }
        
        return Carbon\Carbon::parse($user->last_activity)->diffInMinutes(now()) < 5;
    }
}