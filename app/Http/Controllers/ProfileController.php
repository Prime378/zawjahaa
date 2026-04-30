<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Helpers\ProfileHelper; // IMPORT THIS
use Illuminate\Support\Facades\Log;
use App\Models\PremiumCart;
use Carbon\Carbon; // Add this line

class ProfileController extends Controller
{
    /**
     * Show user profile
     */
     
     public function heartbeat()
{
    if(auth()->check()) {
        auth()->user()->update([
            'last_seen' => now(),
            'is_online' => 1
        ]);
    }

    return response()->json(['success' => true]);
}
    public function index()
    {
        $user = Auth::user();
        return view('website.profile', compact('user'));
    }
    
    public function show($id)
    {
        $user = User::findOrFail($id);

        // Payment table se check karo
        $payment = PremiumCart::where('buy_id', $id)
                            ->where('admin_approved', 1)
                            ->first();

        $hasAdminApproval = $payment ? true : false;
        
        return view('website.user-profile', compact('user', 'hasAdminApproval'));
    }
    
    /**
     * Update user profile
     **/
    public function update(Request $request)
{
    try {
        $user = Auth::user();
        
        $data = $request->validate([
    // Personal Information
    'name' => 'required|string|max:255',
    'email' => 'required|email|unique:users,email,' . $user->id,
    'phone' => 'required|string|max:20',
    'dob' => 'required|date',
    'gender' => 'required|in:male,female,other',
    'height' => 'required|string|max:10',
    
    // Location
    'country' => 'required|string|max:255',
    'city' => 'required|string|max:255',
    'living_country' => 'required|string|max:100',

    // Identity
    'cnic' => 'required|string|max:20',
    'on_behalf' => 'required|string|max:50',

    // Religious & Social
    'religion' => 'required|string|max:255',
    'religious_sect' => 'required|in:All,sunni,shia,deobandi,barelvi,ahl_e_hadith,other',
    'caste' => 'required|string|max:255',

    'marital_status' => 'required|in:Unmarried,Nikah_Only,married_has_children,married_no_children,divorced_has_children,divorced_no_children,widowed_has_children,widowed_no_children,separated_has_children,separated_no_children,Infertile',

    // 🔥 Conditional Children
    'children_details' => 'required_if:marital_status,married_has_children,divorced_has_children,widowed_has_children,separated_has_children|nullable|string|max:255',

    // Disease
    'disease_status' => 'required|in:Yes,No',

    // 🔥 Conditional Disease Detail
    'disease_detail' => 'required_if:disease_status,Yes|nullable|string',

    // Education & Career
    'income' => 'required|string|max:100',
    'education' => 'required|string|max:255',
    'profession' => 'required|string|max:255',

    // Family Details
    'father_occupation' => 'required|string|max:255',
    'mother_occupation' => 'required|string|max:255',
    'ownership' => 'required|string|max:255',
    'siblings' => 'required|string|max:255',
    'family_type' => 'required|in:joint,extended,single_parent,blended',
    'family_status' => 'required|in:upper_class,upper_middle,middle,lower_middle,lower_class',

    // About
    'about_me' => 'required|string',

    // Image
    'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120'
]);

        // Handle image upload
        if ($request->hasFile('profile_image')) {
            // Delete old image if exists
            if ($user->profile_image && file_exists(public_path($user->profile_image))) {
                unlink(public_path($user->profile_image));
            }
            
            $image = $request->file('profile_image');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $imagePath = 'uploads/profiles/' . $imageName;
            $image->move(public_path('uploads/profiles'), $imageName);
            $data['profile_image'] = $imagePath;
        }

        // Update user
        $user->update($data);
        
        // Get fresh user data with proper image URL
        $freshUser = $user->fresh();
        
        // Add full URL for image if needed
        if ($freshUser->profile_image) {
            $freshUser->profile_image_url = asset($freshUser->profile_image);
        }
        
        return response()->json([
            'success' => true,
            'message' => 'Profile updated successfully!',
            'user' => $freshUser
        ]);

    } catch (\Illuminate\Validation\ValidationException $e) {
        return response()->json([
            'success' => false,
            'errors' => $e->errors()
        ], 422);
    } catch (\Exception $e) {
        \Log::error('Profile update error: ' . $e->getMessage());
        return response()->json([
            'success' => false,
            'message' => 'An error occurred while updating profile: ' . $e->getMessage()
        ], 500);
    }
}
    /**
     * AI Matchmaking page
     */
    public function aiMatch()
{
    $user = Auth::user();
    
    // Get all profiles except current user
    $recommendedProfiles = User::where('id', '!=', auth()->id())
                              ->latest()
                              ->limit(3)
                              ->get();
    
    $aiMatchesCount = User::where('id', '!=', auth()->id())->count();
    
    // Get unlocked profile IDs from PremiumCart
    $unlockedIds = [];
    if (Auth::check()) {
        $purchases = PremiumCart::where('buyer_id', Auth::id())->get();
        
        foreach($purchases as $purchase) {
            $isApproved = false;
            
            if (isset($purchase->status) && in_array($purchase->status, ['approved', 'active', 'completed', '1', 1])) {
                $isApproved = true;
            }
            
            if (isset($purchase->admin_approved) && in_array($purchase->admin_approved, ['approved', 'active', 'completed', '1', 1])) {
                $isApproved = true;
            }
            
            if ($isApproved) {
                $unlockedIds[] = $purchase->buy_id;
            }
        }
        
        $unlockedIds = array_unique($unlockedIds);
    }
    
    return view('website.ai-match', compact('recommendedProfiles', 'aiMatchesCount', 'user', 'unlockedIds'));
}
    
    /**
     * Load more matches via AJAX
     */
    public function loadMoreMatches(Request $request)
    {
        $page = $request->page ?? 1;
        $perPage = 3;
        
        $profiles = User::where('id', '!=', auth()->id())
                       ->latest()
                       ->paginate($perPage, ['*'], 'page', $page);
        
        $html = '';
        foreach ($profiles as $profile) {
            $age = $profile->dob ? Carbon::parse($profile->dob)->age : 'N/A';
            $formattedId = 'ZWJ' . str_pad($profile->id, 5, '0', STR_PAD_LEFT);
            $location = trim(($profile->city ?? '') . ', ' . ($profile->country ?? ''), ', ');
            $location = $location ?: 'Location not specified';
            $matchPercentage = rand(85, 98);
            
            $html .= $this->renderMatchCard($profile, $age, $formattedId, $location, $matchPercentage);
        }
        
        return response()->json([
            'html' => $html,
            'next_page' => $profiles->hasMorePages() ? $page + 1 : null
        ]);
    }
    
    /**
     * Render match card HTML
     */
    private function renderMatchCard($profile, $age, $formattedId, $location, $matchPercentage)
    {
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
                    <img src="' . $imageUrl . '" 
                         class="rounded-circle border border-3 border-success" 
                         width="90" height="90" 
                         alt="' . $formattedId . '" 
                         style="object-fit: cover;">
                </div>
                <div class="col-md-7">
                    <h4 class="fw-bold mb-2">' . $formattedId . '</h4>
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
                    <a href="' . route('profile.show', $profile->id) . '" class="btn btn-primary btn-sm mt-2 px-4 rounded-pill">View Profile</a>
                </div>
            </div>
        </div>';
    }
}