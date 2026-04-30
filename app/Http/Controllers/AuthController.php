<?php
// Add these methods to your AuthController.php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    // Show Register Form
    public function showRegister()
    {
        return view('website.index');
    }
    // Show Login Form
    public function showLogin()
    {
        return view('auth.login');
    }

    // ===== CHECK DUPLICATES BEFORE REGISTRATION =====
    public function checkEmail(Request $request)
    {
        $exists = User::where('email', $request->email)->exists();
        return response()->json(['exists' => $exists]);
    }

    public function checkPhone(Request $request)
    {
        $phone = preg_replace('/[^0-9]/', '', $request->phone);
        $exists = User::where('phone', $phone)->exists();
        return response()->json(['exists' => $exists]);
    }

    public function checkCnic(Request $request)
    {
        $cnic = preg_replace('/[^0-9]/', '', $request->cnic);
        $exists = User::where('cnic', $cnic)->exists();
        return response()->json(['exists' => $exists]);
    }

    // ===== HANDLE REGISTRATION =====
    public function register(Request $request)
    {
        // ✅ VALIDATION
        $validator = Validator::make($request->all(), [

            // REQUIRED FIELDS
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'gender' => 'required|in:male,female,other',
            'dob' => 'required|date|before:-18 years',
            'living_country' => 'required|string|max:100',
            'religion' => 'required|string|max:100',
            'marital_status' => 'required|string|max:100',
            'education' => 'required|string|max:200',
            'height' => 'required|string|max:50',
            'caste' => 'required|string|max:100',
            'religious_sect' => 'required|string|max:100',
            'income' => 'required|string|max:50',
            'ownership' => 'required|string|max:50',
            'father_occupation' => 'required|string|max:100',
            'mother_occupation' => 'required|string|max:100',
            'siblings' => 'required|string|max:100',
            'family_type' => 'required|string|max:50',
            'family_status' => 'required|string|max:50',
            'about_me' => 'required|string|max:1000',
            'profession' => 'required|string|max:200',

            'country' => 'required|string|max:100',
            'city' => 'required|string|max:100',

            // AUTH
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|digits:11|unique:users,phone',
            'cnic' => 'required|regex:/^[0-9]{5}-[0-9]{7}-[0-9]{1}$/|unique:users,cnic',
            'password' => 'required|string|min:6|confirmed',

            // FILE
            'profile_image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',

            // OPTIONAL
            'on_behalf' => 'nullable|string|max:100',
            'disease_status' => 'required|in:Yes,No',
            'disease_detail' => 'required_if:disease_status,Yes|nullable|string|max:500',
            'children_details' => 'nullable|string|max:255',

        ], [

            // CUSTOM MESSAGES
            'first_name.required' => 'First name is required',
            'last_name.required' => 'Last name is required',

            'email.required' => 'Email is required',
            'email.email' => 'Invalid email format',
            'email.unique' => 'Email already exists',

            'phone.required' => 'Phone is required',
            'phone.digits' => 'Phone must be 11 digits (03XXXXXXXXX)',
            'phone.unique' => 'Phone already exists',

            'cnic.required' => 'CNIC is required',
            'cnic.regex' => 'CNIC format must be xxxxx-xxxxxxx-x',
            'cnic.unique' => 'CNIC already exists',

            'password.required' => 'Password required',
            'password.min' => 'Min 6 characters',
            'password.confirmed' => 'Passwords do not match',

            'dob.before' => 'You must be at least 18 years old',
            'profile_image.required' => 'Profile image is required',
            'profile_image.image' => 'File must be an image',
            'profile_image.mimes' => 'Only JPG, PNG, WEBP images allowed',
            'profile_image.max' => 'Image size must be less than 2MB',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        // ✅ CLEAN DATA
        $phone = preg_replace('/[^0-9]/', '', $request->phone);
        $cnic = preg_replace('/[^0-9]/', '', $request->cnic);

        // ✅ IMAGE UPLOAD (SAFE)
        $profileImagePath = null;

        if ($request->hasFile('profile_image')) {

            $path = public_path('uploads/profiles');

            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }

            $image = $request->file('profile_image');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();

            $image->move($path, $imageName);

            $profileImagePath = 'uploads/profiles/' . $imageName;
        }

        // ✅ CREATE USER
        $user = User::create([
            'name' => $request->first_name . ' ' . $request->last_name,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'gender' => $request->gender,
            'dob' => $request->dob,
            'religion' => $request->religion,
            'marital_status' => $request->marital_status,
            'education' => $request->education,
            'profession' => $request->profession,

            'email' => $request->email,
            'phone' => $phone,
            'cnic' => $cnic,

            'height' => $request->height,
            'caste' => $request->caste,
            'religious_sect' => $request->religious_sect,
            'income' => $request->income,
            'ownership' => $request->ownership,
            'father_occupation' => $request->father_occupation,
            'mother_occupation' => $request->mother_occupation,
            'siblings' => $request->siblings,
            'family_type' => $request->family_type,
            'family_status' => $request->family_status,
            'about_me' => $request->about_me,
            'on_behalf' => $request->on_behalf,

            'country' => $request->country,
            'city' => $request->city,
            'living_country' => $request->living_country,

            'password' => Hash::make($request->password),

            'disease_status' => $request->disease_status,
            'disease_detail' => $request->disease_status == 'Yes' ? $request->disease_detail : null,
            'children_details' => $request->children_details,

            'profile_image' => $profileImagePath,

            'is_online' => 0,
            'last_seen' => now(),
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Account created successfully! Please login.',
            'redirect' => route('login')
        ]);
    }

    // ===== HANDLE LOGIN =====
    public function login(Request $request)
    {
        // Validate request
        $validator = Validator::make($request->all(), [
            'phone' => 'required|string',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'errors' => $validator->errors()
                ], 422);
            }
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Please fix the errors below.');
        }

        // Clean phone number
        $phone = preg_replace('/[^0-9+]/', '', $request->phone);

        // Find user by phone
        $user = User::where('phone', $phone)->first();

        if (!$user) {
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'No account found with this phone number.'
                ], 401);
            }
            return redirect()->back()
                ->withErrors(['phone' => 'No account found with this phone number.'])
                ->withInput();
        }

        // Attempt login
        if (Auth::attempt(['phone' => $phone, 'password' => $request->password], $request->boolean('remember'))) {
            $request->session()->regenerate();
            $loggedUser = Auth::user();
            $loggedUser->is_online = true;
            $loggedUser->last_seen = now();
            $loggedUser->save();
            if (strtolower(trim($loggedUser->role)) === 'admin') {
                $redirect = url('/admin/dashboard');
            } else {
                $redirect = url('/dashboard');
            }
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'success' => true,
                    'redirect' => $redirect,
                    'message' => 'Login successful!'
                ]);
            }

            return redirect()->intended($redirect)
                ->with('success', 'Login successful!');
        }

        // Password incorrect
        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => false,
                'message' => 'Incorrect password. Please try again.'
            ], 401);
        }

        return redirect()->back()
            ->withErrors(['password' => 'Incorrect password. Please try again.'])
            ->withInput();
    }

    // ===== UPDATE PROFILE =====
    public function update(Request $request)
    {
        try {
            $user = Auth::user();

            // Validate inputs including optional profile image
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email,' . $user->id,
                'country_code' => 'nullable|string|max:10',
                'phone' => 'required|string|max:20',
                'country' => 'required|string|max:100',
                'city' => 'required|string|max:100',
                'cnic' => 'required|string|max:20',
                'gender' => 'required|in:male,female,other',
                'height' => 'nullable|string|max:50',
                'dob' => 'nullable|date',
                'religion' => 'nullable|string|max:100',
                'marital_status' => 'nullable|string|max:50',
                'profession' => 'nullable|string|max:255',
                'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',

            ]);

            // Handle profile image upload
            if ($request->hasFile('profile_image')) {
                $image = $request->file('profile_image');
                $imageName = 'profile_' . $user->id . '_' . time() . '.' . $image->getClientOriginalExtension();

                // Save image to public/uploads/profiles
                $image->move(public_path('uploads/profiles'), $imageName);
                $validated['profile_image'] = '/uploads/profiles/' . $imageName;

                // Delete old image if exists
                if ($user->profile_image && file_exists(public_path($user->profile_image))) {
                    @unlink(public_path($user->profile_image));
                }
            }

            // Update user data
            $user->update($validated);

            return response()->json([
                'success' => true,
                'message' => 'Profile updated successfully',
                'user' => $user
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error: ' . implode(', ', $e->errors())
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error updating profile: ' . $e->getMessage()
            ], 500);
        }
    }

    // Dashboard page
    public function dashboard()
    {
        return view('website.index');
    }

    // User profile
    public function profile()
    {
        $user = Auth::user();
        return view('website.profile', compact('user'));
    }

    // Logout user
    public function logout(Request $request)
    {
        if (Auth::check()) {

            $user = Auth::user();

            // User ko offline set kar do
            $user->is_online = 0;
            $user->last_seen = now();
            $user->save();
        }

        Auth::logout();

        // Session destroy
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Logged out successfully');
    }
}
?>