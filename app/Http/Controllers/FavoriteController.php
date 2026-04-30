<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class FavoriteController extends Controller
{
    // Send Interest
    public function index()
{
    $sent = DB::table('favorites')
        ->join('users', 'favorites.favorite_user_id', '=', 'users.id')
        ->where('favorites.user_id', Auth::id())
        ->select('users.*')
        
        ->paginate(5, ['*'], 'sent_page');

    $received = DB::table('favorites')
        ->join('users', 'favorites.user_id', '=', 'users.id')
        ->where('favorites.favorite_user_id', Auth::id())
        ->select('users.*')
        ->paginate(5, ['*'], 'received_page');

    return view('website.favorites', compact('sent', 'received'));
}

  public function send($id)
{
    $user = Auth::user();

    if (!$user) {
        return response()->json(['error' => 'Login required'], 401);
    }

    if ($user->id == $id) {
        return response()->json(['error' => 'Cannot send to yourself'], 400);
    }

    $exists = DB::table('favorites')
        ->where('user_id', $user->id)
        ->where('favorite_user_id', $id)
        ->exists();

    if ($exists) {
        return response()->json(['message' => 'Already sent']);
    }

    DB::table('favorites')->insert([
        'user_id' => $user->id,
        'favorite_user_id' => $id,
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    return response()->json(['success' => true]);
}

public function favorites()
{
    return $this->belongsToMany(User::class, 'favorites', 'user_id', 'favorite_user_id');
}
    // My Sent Interests
 public function myFavorites(Request $request)
{
    $user = auth()->user();

    if (!$user) {
        return response()->json([
            'success' => false,
            'favorites' => [],
            'message' => 'User not logged in'
        ]);
    }

    try {
        // Simple query to check if favorites table has data
        $favorites = DB::table('favorites')
            ->where('user_id', $user->id)
            ->get();
        
        // If no favorites found
        if ($favorites->isEmpty()) {
            return response()->json([
                'success' => true,
                'favorites' => [],
                'message' => 'No favorites found'
            ]);
        }
        
        // Get favorite user IDs
        $favoriteIds = $favorites->pluck('favorite_user_id')->toArray();
        
        // Get user details for these IDs
        $users = DB::table('users')
            ->whereIn('id', $favoriteIds)
            ->get();
        
        $favoritesList = [];
        foreach ($users as $userData) {
            $favoritesList[] = [
                'id' => $userData->id,
                'formatted_id' => 'ZWJ' . $userData->id,
                'name' => $userData->name ?? 'Not specified',
                'age' => isset($userData->dob) ? \Carbon\Carbon::parse($userData->dob)->age : 'N/A', // <--- changed
                'gender' => $userData->gender ?? 'Not specified',
                'location' => isset($userData->city) ? $userData->city . ', ' . ($userData->country ?? 'Pakistan') : ($userData->country ?? 'Pakistan'),
                'image_url' => $userData->profile_image ?? '/assets/images/dummy.jpg',
                'is_online' => isset($userData->is_online) ? (bool)$userData->is_online : false,
                'is_verified' => isset($userData->is_verified) ? (bool)$userData->is_verified : false,
                'is_premium' => isset($userData->is_premium) ? (bool)$userData->is_premium : false,
                'has_ai_answers' => false,
                'education' => $userData->education ?? 'Not specified',
                'profession' => $userData->profession ?? 'Not specified',
                'religion' => $userData->religion ?? 'Not specified',
                'last_seen_formatted' => isset($userData->last_seen_at) ? \Carbon\Carbon::parse($userData->last_seen_at)->diffForHumans() : null,
            ];
        }
        
        return response()->json([
            'success' => true,
            'favorites' => $favoritesList,
            'count' => count($favoritesList)
        ]);
        
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'favorites' => [],
            'message' => $e->getMessage(),
            'file' => $e->getFile(),
            'line' => $e->getLine()
        ]);
    }
}
    public function toggle($id)
{
    $user = Auth::user();

    if($user->id == $id){
        return response()->json(['message' => 'Cannot favorite yourself']);
    }

    $exists = DB::table('favorites')
                ->where('user_id', $user->id)
                ->where('favorite_user_id', $id)
                ->exists();

    if($exists){
        DB::table('favorites')
          ->where('user_id', $user->id)
          ->where('favorite_user_id', $id)
          ->delete();

        return response()->json(['success' => true, 'added' => false]);
    } else {
        DB::table('favorites')->insert([
            'user_id' => $user->id,
            'favorite_user_id' => $id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return response()->json(['success' => true, 'added' => true]);
    }
}

    // Received Interests
    public function receivedFavorites()
    {
        $users = DB::table('favorites')
            ->join('users', 'favorites.user_id', '=', 'users.id')
            ->where('favorites.favorite_user_id', Auth::id())
            ->select('users.*')
            ->paginate(10);

        return view('website.received-favorites', compact('users'));
    }

    // Remove Interest
    public function remove($id)
    {
        DB::table('favorites')
            ->where('user_id', Auth::id())
            ->where('favorite_user_id', $id)
            ->delete();

        return response()->json(['success' => true]);
    }
}
