<?php

namespace App\Helpers;

use App\Models\User;
use App\Models\Match;

class StatsHelper
{
    public static function getStats()
    {
        return [
            'totalProfiles' => User::count(),
            'maleCount' => User::where('gender', 'Male')->count(),
            'femaleCount' => User::where('gender', 'Female')->count(),
            'countriesCount' => User::distinct('country')->count('country'),
            'citiesCount' => User::distinct('city')->count('city'),
            'successfulMatches' => self::getSuccessfulMatches(),
            'successRate' => self::getSuccessRate(),
        ];
    }
    
    private static function getSuccessfulMatches()
    {
        // If you have a matches table
        if (class_exists('App\Models\Match')) {
            return Match::where('status', 'accepted')->count() ?: 5000;
        }
        
        // Fallback to static number if no matches table
        return 5000;
    }
    
    private static function getSuccessRate()
    {
        if (class_exists('App\Models\Match')) {
            $total = Match::count();
            $successful = Match::where('status', 'accepted')->count();
            
            if ($total > 0) {
                return round(($successful / $total) * 100);
            }
        }
        
        return 95; // Default fallback
    }
}