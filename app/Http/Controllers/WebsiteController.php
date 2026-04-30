<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Users table se statistics calculate karo
        $totalProfiles = User::count(); // Total users
        
        $maleCount = User::where('gender', 'Male')->count(); // Male users
        $femaleCount = User::where('gender', 'Female')->count(); // Female users
        
        // Unique countries count
        $countriesCount = User::whereNotNull('country')
                            ->distinct('country')
                            ->count('country');
        
        // Unique cities count
        $citiesCount = User::whereNotNull('city')
                         ->distinct('city')
                         ->count('city');
        
        // Successful matches - agar aapke paas data nahi hai to static numbers use karo
        $successfulMatches = 5000; // Static number for now
        $successRate = 95; // Static success rate
        
        $stats = [
            'totalProfiles' => $totalProfiles,
            'maleCount' => $maleCount,
            'femaleCount' => $femaleCount,
            'countriesCount' => $countriesCount,
            'citiesCount' => $citiesCount,
            'successfulMatches' => $successfulMatches,
            'successRate' => $successRate,
        ];
        
        return view('home', compact('stats'));
    }
}