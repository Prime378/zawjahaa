<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class ForgotPasswordController extends Controller
{
    // Step 1: Show forgot password form
    public function showForgotForm() {
        return view('auth.forgot-password');
    }

    // Step 2: Send OTP to user email (AJAX version)
    public function sendVerificationCode(Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return response()->json([
                'errors' => [
                    'email' => ['This email is not registered in our system']
                ]
            ], 422);
        }

        try {
            $otp = rand(100000, 999999);

            $user->otp = $otp;
            $user->otp_created_at = now();
            $user->save();

            // Store email in session
            session()->put('email', $user->email);
            session()->save(); // Force session save

            // Send HTML Email
            Mail::send('email.verification-code', ['user' => $user, 'otp' => $otp], function ($message) use ($user) {
                $message->to($user->email)
                        ->subject('🔐 Password Reset Verification Code - Zawjahaa');
            });

            return response()->json([
                'success' => true,
                'message' => 'Verification code sent to your email',
                'email' => $user->email
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to send verification code. Please try again.'
            ], 500);
        }
    }

    // Step 3: Show verify OTP form
    public function showVerifyForm() {
        // Check both session and old input
        $email = session('email');
        
        if (!$email) {
            return redirect()->route('forgot-password')
                ->withErrors(['email' => 'Please start the password reset process first']);
        }
        
        return view('auth.verify-code', compact('email'));
    }

    // Step 4: Verify OTP (AJAX version)
    public function verifyCode(Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'code' => 'required|numeric|digits:6'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return response()->json([
                'errors' => [
                    'email' => ['Email not found']
                ]
            ], 422);
        }

        // Check if OTP exists
        if (!$user->otp) {
            return response()->json([
                'errors' => [
                    'code' => ['No verification code found. Please request a new code.']
                ]
            ], 422);
        }

        // Check if OTP is expired (15 minutes)
        if ($user->otp_created_at && now()->diffInMinutes($user->otp_created_at) > 15) {
            return response()->json([
                'errors' => [
                    'code' => ['Verification code has expired. Please request a new one.']
                ]
            ], 422);
        }

        // Verify OTP
        if ($user->otp != $request->code) {
            return response()->json([
                'errors' => [
                    'code' => ['Invalid verification code']
                ]
            ], 422);
        }

        // Store email in session after successful OTP
        session(['reset_email' => $user->email]);

        return response()->json([
            'success' => true,
            'message' => 'OTP verified successfully',
            'redirect' => route('reset-password')
        ]);
    }

    // Step 5: Show reset password form
    public function showResetForm() {
        if (!session('reset_email')) {
            return redirect()->route('forgot-password')
                ->withErrors(['email' => 'Please verify your email first']);
        }
        return view('auth.reset-password');
    }

    // Step 6: Reset password (AJAX version) - FIXED
    public function resetPassword(Request $request)
{
    $validator = Validator::make($request->all(), [
        'email' => 'required|email',
        'password' => 'required|confirmed|min:6'
    ]);

    if ($validator->fails()) {
        return redirect()->back()
            ->withErrors($validator)
            ->withInput();
    }

    $user = User::where('email', $request->email)->first();

    if (!$user) {
        return redirect()->back()
            ->withErrors(['email' => 'Email not found']);
    }

    try {
        $user->password = Hash::make($request->password);
        $user->otp = null;
        $user->otp_created_at = null;
        $user->save();

        session()->forget('reset_email');
        session()->forget('email');

        return redirect()->route('login')
            ->with('status', 'Password reset successfully!');

    } catch (\Exception $e) {
        return redirect()->back()
            ->withErrors(['error' => 'Failed to reset password']);
    }
}
}