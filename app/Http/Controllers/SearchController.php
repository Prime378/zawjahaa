<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\PremiumCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;

class SearchController extends Controller
{
    public function index()
    {
        $showAlert = false;
        if (Auth::check()) {
            $user = Auth::user();
            if (!$this->isProfileComplete($user)) {
                $showAlert = true;
            }
        }

        $educations = User::whereNotNull('education')->distinct()->pluck('education');
        $religions = User::whereNotNull('religion')->distinct()->pluck('religion');
        $countries = User::whereNotNull('country')->distinct()->pluck('country');
        $cities = User::whereNotNull('city')->distinct()->pluck('city');
        $maritalStatuses = User::whereNotNull('marital_status')->distinct()->pluck('marital_status');
        $users = User::all();
       $countryCount = User::whereNotNull('country')
    ->distinct('country')
    ->count('country');
        $userCount = User::count();

        return view('website.search', compact(
            'educations',
            'religions',
            'showAlert',
            'users',
            'countries',
            'userCount',
            'cities',
            'countryCount',
            'maritalStatuses'
        ));
    }

    private function isProfileComplete($user)
    {
        $requiredFields = [
            'name',
            'email',
            'phone',
            'dob',
            'gender',
            'height',
            'country',
            'city',
            'religion',
            'on_behalf',
            'marital_status',
            'education',
            'profession',
            'profile_image'
        ];

        foreach ($requiredFields as $field) {
            if (empty($user->$field)) {
                return false;
            }
        }

        return true;
    }
    
    public function search(Request $request)
    {
        if (Auth::check()) {
            $user = Auth::user();

            if (!$this->isProfileComplete($user)) {
                return response()->json([
                    'status' => 'incomplete_profile'
                ]);
            }
        }

        try {
            $query = User::query();

            // Exclude logged-in user
            if (Auth::check()) {
                $query->where('id', '!=', Auth::id());
            }

            // Filter by Profile ID
            if ($request->filled('profile_id')) {
                $profileId = $request->profile_id;
                $actualId = preg_replace('/[^0-9]/', '', $profileId);
                if (is_numeric($actualId)) {
                    $query->where('id', $actualId);
                }
            }

            // Gender Filter
            if ($request->filled('gender')) {
                $query->where('gender', $request->gender);
            }

            // Age Range Filter
            if ($request->filled('age_min') || $request->filled('age_max')) {
                $today = Carbon::today();
                if ($request->filled('age_min')) {
                    $minAge = $request->age_min;
                    $query->where('dob', '<=', $today->copy()->subYears($minAge));
                }
                if ($request->filled('age_max')) {
                    $maxAge = $request->age_max;
                    $query->where('dob', '>=', $today->copy()->subYears($maxAge + 1)->addDay());
                }
            }

            // Height Range Filter
            if ($request->filled('height_min') || $request->filled('height_max')) {
                if ($request->filled('height_min')) {
                    $query->where('height', '>=', $request->height_min);
                }
                if ($request->filled('height_max')) {
                    $query->where('height', '<=', $request->height_max);
                }
            }

            // Marital Status Filter
            if ($request->filled('marital_status')) {
                $query->where('marital_status', $request->marital_status);
            }

            // Religion Filter
            if ($request->filled('religion')) {
                $query->where('religion', 'LIKE', '%' . $request->religion . '%');
            }

            // Caste Filter
            if ($request->filled('caste')) {
                $query->where('caste', 'LIKE', '%' . $request->caste . '%');
            }

            // Mother Tongue Filter
            if ($request->filled('mother_tongue')) {
                $query->where('mother_tongue', $request->mother_tongue);
            }

            // Country Filter
            if ($request->filled('country')) {
                $query->where('country', 'LIKE', '%' . $request->country . '%');
            }

            // City Filter
            if ($request->filled('city')) {
                $query->where('city', 'LIKE', '%' . $request->city . '%');
            }

            // Education Filter
            if ($request->filled('education')) {
                $query->where('education', 'LIKE', '%' . $request->education . '%');
            }

            // Profession Filter
            if ($request->filled('profession')) {
                $query->where('profession', 'LIKE', '%' . $request->profession . '%');
            }

            // On Behalf Filter
            if ($request->filled('on_behalf')) {
                $query->where('on_behalf', $request->on_behalf);
            }

            // Online Now Filter
            if ($request->boolean('online_now')) {
                $query->where('is_online', true)
                      ->where('last_seen', '>', Carbon::now()->subMinutes(5));
            }

            // Photo Only Filter
            if ($request->boolean('photo_only')) {
                $query->whereNotNull('profile_image');
            }

            // Premium Only Filter
            if ($request->boolean('premium_only')) {
                $query->where(function ($q) {
                    $q->where('premium_status', 'paid')
                        ->where(function ($q2) {
                            $q2->whereNull('premium_expires_at')
                                ->orWhere('premium_expires_at', '>', Carbon::now());
                        });
                });
            }

            // Verified Only Filter
            if ($request->boolean('verified_only')) {
                $query->whereNotNull('email_verified_at');
            }

            // Get paginated results
            $profiles = $query->latest()->paginate(12);

            // Prepare profiles data
            $profilesData = [];
            foreach ($profiles as $profile) {
                $age = $profile->dob ? Carbon::parse($profile->dob)->age : 'N/A';

                // Image URL
                $imageUrl = $profile->profile_image
                    ? asset('uploads/profiles/' . basename($profile->profile_image))
                    : asset('assets/images/dummy.jpg');

                // Premium status
                $isPremiumOwner = ($profile->premium_status === 'paid') &&
                    (is_null($profile->premium_expires_at) ||
                     Carbon::parse($profile->premium_expires_at)->isFuture());

                // Online status
                $isOnline = false;
                if ($profile->last_seen) {
                    try {
                        $lastSeenTime = Carbon::parse($profile->last_seen);
                        $isOnline = ($profile->is_online && $lastSeenTime->gt(now()->subMinutes(5))) || $lastSeenTime->gt(now()->subMinutes(5));
                    } catch (\Exception $e) {
                        $isOnline = false;
                    }
                }

                $location = trim(($profile->city ?? '') . ', ' . ($profile->country ?? ''), ', ');
                $location = $location ?: 'Location not specified';
                
                $maritalStatus = $profile->marital_status
                    ? ucfirst(str_replace('_', ' ', $profile->marital_status))
                    : 'Not specified';

                $formattedId = 'ZWJ' . str_pad($profile->id, 5, '0', STR_PAD_LEFT);

                $profilesData[] = [
                    'id' => $profile->id,
                    'name' => $profile->name ?? 'Not specified',
                    'formatted_id' => $formattedId,
                    'age' => $age,
                    'gender' => $profile->gender ? ucfirst($profile->gender) : 'N/A',
                    'location' => $location,
                    'marital_status' => $maritalStatus,
                    'education' => $profile->education ?? 'Not specified',
                    'profession' => $profile->profession ?? 'Not specified',
                    'religion' => $profile->religion ?? 'Not specified',
                    'image_url' => $imageUrl,
                    'is_premium' => $isPremiumOwner,
                    'is_online' => $isOnline,
                    'is_verified' => !is_null($profile->email_verified_at),
                    'has_ai_answers' => !is_null($profile->ai_answers),
                    'last_seen' => $profile->last_seen,
                    'last_seen_formatted' => $profile->last_seen ? Carbon::parse($profile->last_seen)->diffForHumans() : null
                ];
            }

            return response()->json([
                'success' => true,
                'total' => $profiles->total(),
                'current_page' => $profiles->currentPage(),
                'last_page' => $profiles->lastPage(),
                'per_page' => $profiles->perPage(),
                'profiles' => $profilesData,
                'next_page' => $profiles->hasMorePages()
            ]);

        } catch (\Exception $e) {
            Log::error('Search error: ' . $e->getMessage());
            Log::error($e->getTraceAsString());
            
            return response()->json([
                'success' => false,
                'error' => $e->getMessage()
            ], 500);
        }
    }
}