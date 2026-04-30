<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:1000'
        ]);

        $feedback = Feedback::create([
            'user_id' => Auth::id(),
            'message' => $request->message
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Thank you for your feedback!'
        ]);
    }
}