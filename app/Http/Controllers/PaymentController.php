<?php

namespace App\Http\Controllers;

use App\Models\PremiumCart;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    // Checkout page show
    public function checkout($userId, $package)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $profileUser = User::findOrFail($userId);
        
        $packages = [
            'Basic' => 999,
            'Standard' => 1999,
            'Premium' => 2999,
        ];

        if (!array_key_exists($package, $packages)) {
            abort(404);
        }

        $amount = $packages[$package];

        return view('website.checkout', compact('profileUser', 'package', 'amount'));
    }

    // Store checkout - AJAX
    public function storeCheckout(Request $request)
    {
        try {
            // 1. Check login
            if (!Auth::check()) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Please login first'
                ], 401);
            }

            // 2. Validate
            $validator = Validator::make($request->all(), [
                'buy_id' => 'required|exists:users,id',
                'package' => 'required',
                'amount' => 'required|numeric',
                'payment_method' => 'required',
                'payment_number' => 'required|min:10'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => 'error',
                    'message' => $validator->errors()->first()
                ]);
            }

            $buyer_id = Auth::id();      // Jo pay kar raha
            $buy_id = $request->buy_id;  // Jiski profile buy ho rahi

            // 3. Apni profile check
            if ($buyer_id == $buy_id) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'You cannot buy your own profile'
                ]);
            }

            // 4. Check already approved
            $approved = PremiumCart::where('buyer_id', $buyer_id)
                ->where('buy_id', $buy_id)
                ->where('status', 'approved')
                ->where('admin_approved', true)
                ->first();

            if ($approved) {
                return response()->json([
                    'status' => 'approved',
                    'message' => 'You have already purchased this profile'
                ]);
            }

            // 5. Check pending
            $pending = PremiumCart::where('buyer_id', $buyer_id)
                ->where('buy_id', $buy_id)
                ->where('status', 'pending')
                ->where('admin_approved', false)
                ->first();

            if ($pending) {
                return response()->json([
                    'status' => 'pending',
                    'message' => 'Your payment request is already pending. Please wait for admin approval.'
                ]);
            }

            // 6. Create new payment record
            $payment = PremiumCart::create([
                'buyer_id' => $buyer_id,
                'buy_id' => $buy_id,
                'package' => $request->package,
                'amount' => $request->amount,
                'payment_method' => $request->payment_method,
                'payment_number' => $request->payment_number,
                'status' => 'pending',
                'admin_approved' => false
            ]);

            // 7. Success response
            return response()->json([
                'status' => 'success',
                'message' => 'Payment request sent successfully! Admin will approve soon.',
                'data' => [
                    'id' => $payment->id,
                    'buyer_id' => $payment->buyer_id,
                    'buy_id' => $payment->buy_id
                ]
            ]);

        } catch (\Exception $e) {
            Log::error('Payment error: ' . $e->getMessage());
            
            return response()->json([
                'status' => 'error',
                'message' => 'Server error: ' . $e->getMessage()
            ], 500);
        }
    }
}