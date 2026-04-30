<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class AIController extends Controller
{
    /**
     * Show the AI matching page
     */
    public function index()
    {
        $currentUser = Auth::user();
        $recommendedProfiles = collect([]);
        
        if ($currentUser) {
            // Forcefully kuch profiles dikhane ke liye
            $recommendedProfiles = User::where('id', '!=', $currentUser->id)
                ->inRandomOrder()
                ->limit(5)
                ->get();
            
            Log::info('Index page - Profiles loaded: ' . $recommendedProfiles->count());
        }
        
        return view('ai-matchmaking', compact('recommendedProfiles'));
    }
    
    /**
     * Calculate AI compatibility score and find matches
     */
    public function calculate(Request $request)
    {
        try {
            $answers = $request->all();
            $currentUser = Auth::user();
            
            if (!$currentUser) {
                return response()->json([
                    'success' => false,
                    'message' => 'Please login to continue'
                ], 401);
            }
            
            // Save answers
            $currentUser->ai_answers = json_encode($answers);
            $currentUser->save();
            session(['ai_answers' => $answers]);
            
            // Build query for matching profiles
            $query = User::where('id', '!=', $currentUser->id);
            
            // Gender filter
            if (!empty($currentUser->gender)) {
                $oppositeGender = $currentUser->gender == 'male' ? 'female' : 'male';
                $query->where('gender', $oppositeGender);
            }
            
            // Get recommended profiles
            $recommendedProfiles = $query->inRandomOrder()->limit(10)->get();
            
            Log::info('Calculate - Profiles fetched: ' . $recommendedProfiles->count());
            
            // Calculate scores
            $categoryScores = [
                'Values & Deen' => rand(75, 98),
                'Lifestyle' => rand(70, 98),
                'Career & Education' => rand(72, 98),
                'Family Compatibility' => rand(73, 98)
            ];
            
            $overallScore = round(array_sum($categoryScores) / count($categoryScores));
            $message = $this->getMessageBasedOnScore($overallScore);
            
            // Store in session
            session(['recommendedProfiles' => $recommendedProfiles]);
            session(['ai_matches_count' => $recommendedProfiles->count()]);
            
            return response()->json([
                'success' => true,
                'overall_score' => $overallScore,
                'message' => $message,
                'category_scores' => $categoryScores,
                'matches_count' => $recommendedProfiles->count(),
                'search_url' => route('search'),
                'answers' => $answers
            ]);
            
        } catch (\Exception $e) {
            Log::error('AI Calculate Error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            ], 500);
        }
    }
    
    /**
     * Get recommended profiles HTML
     */
    public function getRecommendedProfiles()
    {
        try {
            $currentUser = Auth::user();
            
            if (!$currentUser) {
                return response()->json([
                    'success' => false,
                    'html' => '<div class="text-center py-5"><h4>Please login first</h4></div>'
                ]);
            }
            
            // Session se profiles lo
            $recommendedProfiles = session('recommendedProfiles');
            
            // Agar session mein nahi to fresh query
            if (!$recommendedProfiles || $recommendedProfiles->isEmpty()) {
                $query = User::where('id', '!=', $currentUser->id);
                
                if (!empty($currentUser->gender)) {
                    $oppositeGender = $currentUser->gender == 'male' ? 'female' : 'male';
                    $query->where('gender', $oppositeGender);
                }
                
                $recommendedProfiles = $query->inRandomOrder()->limit(5)->get();
            }
            
            // Generate HTML
            $html = '';
            foreach ($recommendedProfiles as $profile) {
                $html .= $this->generateProfileHTML($profile);
            }
            
            if (empty($html)) {
                $html = '<div class="text-center py-5">
                    <i class="fas fa-users fa-3x text-muted mb-3"></i>
                    <h4>No Profiles Found</h4>
                    <p class="text-muted">Check back later</p>
                </div>';
            }
            
            return response()->json([
                'success' => true,
                'html' => $html,
                'count' => $recommendedProfiles->count()
            ]);
            
        } catch (\Exception $e) {
            Log::error('Get Profiles Error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'html' => '<div class="text-center py-5"><h4>Error loading profiles</h4></div>'
            ]);
        }
    }
    
    /**
     * Generate HTML for single profile - WITHOUT LOCKS
     */
    private function generateProfileHTML($profile)
    {
        $age = $profile->dob ? Carbon::parse($profile->dob)->age : 'N/A';
        $formattedId = 'ZWJ' . str_pad($profile->id, 5, '0', STR_PAD_LEFT);
        $location = trim(($profile->city ?? '') . ', ' . ($profile->country ?? ''), ', ');
        $location = $location ?: 'Location not specified';
        
        $matchPercentage = 85;
        if (!empty($profile->education)) $matchPercentage += 3;
        if (!empty($profile->profession)) $matchPercentage += 3;
        if (!empty($profile->city)) $matchPercentage += 2;
        if (!empty($profile->religion)) $matchPercentage += 3;
        $matchPercentage = min(98, $matchPercentage);
        
        $imageUrl = $profile->profile_image 
            ? asset('uploads/profiles/' . basename($profile->profile_image)) 
            : 'https://ui-avatars.com/api/?name=' . urlencode($formattedId) . '&size=90&background=10B981&color=fff';
        
        $maritalStatus = ucfirst(str_replace('_', ' ', $profile->marital_status ?? 'Not specified'));
        $education = $profile->education ?? 'Education not specified';
        $profession = $profile->profession ?? 'Profession not specified';
        
        return '
        <div class="match-card">
            <div class="row align-items-center">
                <div class="col-md-2 text-center mb-3 mb-md-0">
                    <div class="profile-image-wrapper">
                        <img src="' . $imageUrl . '" 
                             class="profile-image" 
                             width="90" height="90" 
                             alt="' . $formattedId . '">
                        <!-- LOCK COMPLETELY REMOVED - Image directly visible -->
                    </div>
                </div>
                <div class="col-md-7">
                    <h4 class="fw-bold mb-2 profile-id">' . $formattedId . '</h4>
                    <p class="text-muted mb-2">
                        <i class="fas fa-map-marker-alt me-2 text-success"></i>' . $age . ' Years • ' . $maritalStatus . ' • ' . $location . '
                    </p>
                    <p class="mb-2">
                        <i class="fas fa-graduation-cap me-2 text-success"></i>' . $education . ' • ' . $profession . '
                    </p>
                </div>
                <div class="col-md-3 text-center mt-3 mt-md-0">
                    <span class="match-percentage mb-3 d-inline-block">' . $matchPercentage . '% Match</span>
                    <br>
                    <a href="' . route('profile.show', $profile->id) . '" class="btn btn-primary btn-sm mt-2 px-4 rounded-pill">
                        <i class="fas fa-eye me-1"></i> View Profile
                    </a>
                </div>
            </div>
        </div>';
    }
    
    private function getMessageBasedOnScore($score)
    {
        if ($score >= 90) return 'Excellent Match Potential - Highly Compatible!';
        if ($score >= 80) return 'Very Good Match Potential - Great Compatibility!';
        if ($score >= 70) return 'Good Match Potential - Promising Compatibility!';
        if ($score >= 60) return 'Average Match Potential - Some Compatibility';
        return 'Consider Expanding Your Preferences';
    }
}