<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Contact;
use App\Models\Feedback;
use App\Models\VisitorLog;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    // Dashboard
    public function index()
    {
        $totalUsers = User::count();
        $todayUsers = User::whereDate('created_at', Carbon::today())->count();
        $onlineUsers = User::where('last_seen', '>=', Carbon::now()->subMinutes(5))->count();
        
        $maleUsers = User::where('gender', 'male')->count();
        $femaleUsers = User::where('gender', 'female')->count();
        
        $cityWiseUsers = User::select('city', DB::raw('count(*) as total'))
            ->whereNotNull('city')
            ->where('city', '!=', '')
            ->groupBy('city')
            ->orderBy('total', 'DESC')
            ->limit(10)
            ->get();
        
        $recentUsers = User::latest()->take(10)->get();
        
        return view('admin.dashboard', compact(
            'totalUsers', 'todayUsers', 'onlineUsers', 
            'maleUsers', 'femaleUsers', 'cityWiseUsers', 'recentUsers'
        ));
    }
    
    // Users Page
    public function users()
    {
        $users = User::latest()->paginate(15);
        return view('admin.users', compact('users'));
    }
    
    // Feedbacks Page
    public function feedbacks()
    {
        $feedbacks = Feedback::with('user')->latest()->paginate(15);
        return view('admin.feedbacks', compact('feedbacks'));
    }
    // Store User (Admin create user)
public function storeUser(Request $request)
{
    $validator = Validator::make($request->all(), [
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'phone' => 'required|digits:11|unique:users,phone',
        'cnic' => 'nullable|string|unique:users,cnic',
        'password' => 'required|min:6|confirmed',
        'gender' => 'required|in:male,female',
        'role' => 'required|in:user,admin',
        'profile_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    $imagePath = null;
    if ($request->hasFile('profile_image')) {
        $image = $request->file('profile_image');
        $imageName = time() . '_user_' . uniqid() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads/users'), $imageName);
        $imagePath = 'uploads/users/' . $imageName;
    }

    User::create([
        'name' => $request->name,
        'first_name' => $request->first_name,
        'last_name' => $request->last_name,
        'email' => $request->email,
        'phone' => $request->phone,
        'cnic' => $request->cnic,
        'password' => Hash::make($request->password),
        'gender' => $request->gender,
        'dob' => $request->dob,
        'city' => $request->city,
        'country' => $request->country,
        'profile_image' => $imagePath,
        'role' => $request->role,
        'is_online' => 0,
        'last_seen' => now(),
    ]);

    return redirect()->route('admin.users')->with('success', 'User created successfully!');
}

// Update User (Admin edit user)
public function updateUser(Request $request, $id)
{
    $user = User::findOrFail($id);

    $validator = Validator::make($request->all(), [
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $id,
        'phone' => 'required|digits:11|unique:users,phone,' . $id,
        'gender' => 'required|in:male,female',
        'role' => 'required|in:user,admin',
        'profile_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    if ($request->hasFile('profile_image')) {
        if ($user->profile_image && file_exists(public_path($user->profile_image))) {
            @unlink(public_path($user->profile_image));
        }
        $image = $request->file('profile_image');
        $imageName = time() . '_user_' . uniqid() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads/users'), $imageName);
        $user->profile_image = 'uploads/users/' . $imageName;
    }

    $user->name = $request->name;
    $user->first_name = $request->first_name;
    $user->last_name = $request->last_name;
    $user->email = $request->email;
    $user->phone = $request->phone;
    $user->cnic = $request->cnic;
    $user->gender = $request->gender;
    $user->dob = $request->dob;
    $user->city = $request->city;
    $user->country = $request->country;
    $user->role = $request->role;

    if ($request->filled('password')) {
        $user->password = Hash::make($request->password);
    }

    $user->save();

    return redirect()->route('admin.users')->with('success', 'User updated successfully!');
}

// Get User Data for Edit (AJAX)
public function editUserData($id)
{
    $user = User::findOrFail($id);
    return response()->json(['user' => $user]);
}
    // Activity Logs Page
    public function activityLogs()
    {
        try {
            $logs = VisitorLog::with('user')->latest()->paginate(20);
            
            $totalVisits = VisitorLog::count();
            $uniqueVisitors = VisitorLog::distinct('ip_address')->count('ip_address');
            $loggedInUsers = VisitorLog::where('login_status', 1)->count();
            $todayVisits = VisitorLog::whereDate('created_at', Carbon::today())->count();
            
            $deviceStats = VisitorLog::select('device', DB::raw('count(*) as total'))
                ->whereNotNull('device')
                ->groupBy('device')
                ->get();
            
            $browserStats = VisitorLog::select('browser', DB::raw('count(*) as total'))
                ->whereNotNull('browser')
                ->groupBy('browser')
                ->get();
            
            return view('admin.activity_logs', compact(
                'logs', 'totalVisits', 'uniqueVisitors', 
                'loggedInUsers', 'todayVisits', 'deviceStats', 'browserStats'
            ));
            
        } catch (\Exception $e) {
            return view('admin.activity_logs')->with('error', 'Failed to load activity logs');
        }
    }
    
    // Settings Page
    public function settings()
    {
        return view('admin.settings');
    }
    
    // Profile Page
    public function profile()
    {
        $user = auth()->user();
        return view('admin.profile', compact('user'));
    }
    
    // Update User Role
    public function updateRole(Request $request, $id)
    {
        try {
            $user = User::findOrFail($id);
            
            if ($user->id === auth()->id()) {
                return response()->json(['status' => 'error', 'message' => 'You cannot change your own role']);
            }
            
            $user->role = $request->role;
            $user->save();
            
            return response()->json(['status' => 'success', 'message' => 'Role updated successfully']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => 'Failed to update role']);
        }
    }
    
    // Delete User
    public function destroyUser($id)
    {
        try {
            $user = User::findOrFail($id);
            
            if ($user->id === auth()->id()) {
                return response()->json(['status' => 'error', 'message' => 'You cannot delete yourself']);
            }
            
            if ($user->profile_image && file_exists(public_path($user->profile_image))) {
                @unlink(public_path($user->profile_image));
            }
            
            $user->delete();
            return response()->json(['status' => 'success', 'message' => 'User deleted successfully']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => 'Failed to delete user']);
        }
    }
    
    // Delete Feedback
    public function destroyFeedback($id)
    {
        try {
            $feedback = Feedback::findOrFail($id);
            $feedback->delete();
            return response()->json(['status' => 'success', 'message' => 'Feedback deleted successfully']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => 'Failed to delete feedback']);
        }
    }
    // Contact Queries Page
public function contacts()
{
    $contacts = Contact::latest()->paginate(20);
    return view('admin.contacts', compact('contacts'));
}

// Delete Contact Query
public function destroyContact($id)
{
    try {
        $contact = Contact::findOrFail($id);
        $contact->delete();
        return response()->json(['status' => 'success', 'message' => 'Contact query deleted successfully']);
    } catch (\Exception $e) {
        return response()->json(['status' => 'error', 'message' => 'Failed to delete contact']);
    }
}
    // Clear Activity Logs
    public function clearActivityLogs()
    {
        try {
            VisitorLog::truncate();
            return response()->json(['status' => 'success', 'message' => 'All activity logs cleared successfully']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => 'Failed to clear logs']);
        }
    }
}