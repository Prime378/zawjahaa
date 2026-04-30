<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class OnlineStatusController extends Controller
{

    public function updateOnlineStatus(Request $request)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $now = Carbon::now();
            
            $user->last_activity = $now;
            $user->last_seen = $now;
            $user->is_online = true;
            $user->save();
            
            return response()->json([
                'success' => true,
                'is_online' => true,
                'last_seen' => $now->format('Y-m-d H:i:s')
            ]);
        }
        
        return response()->json(['success' => false], 401);
    }

    public function update(Request $request)
    {
        try {
            if (!Auth::check()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Not logged in'
                ], 401);
            }

            $user = Auth::user();
            $user->is_online = true;
            $user->last_seen = now();
            $user->save();

            return response()->json([
                'success' => true,
                'message' => 'Status updated',
                'last_seen' => now()->toDateTimeString()
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function setOffline(Request $request)
    {
        try {
            if (Auth::check()) {
                $user = Auth::user();
                $user->is_online = false;
                $user->last_seen = now();
                $user->save();
            }
            
            return response()->json(['success' => true]);
            
        } catch (\Exception $e) {
            return response()->json(['success' => false], 500);
        }
    }
}