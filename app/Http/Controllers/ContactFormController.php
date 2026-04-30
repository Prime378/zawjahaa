<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    public function showForm()
    {
        return view('contact');
    }

    public function submitForm(Request $request)
    {
        try {
            // Validation
            $data = $request->validate([
                'full_name' => 'required|string|max:255',
                'phone' => 'required|string|max:50',
                'email' => 'required|email|max:255',
                'looking_for' => 'nullable|string|max:50',
                'age' => 'nullable|integer|min:18|max:100',
                'location' => 'nullable|string|max:255',
                'profession' => 'nullable|string|max:255',
                'service' => 'nullable|string|max:255',
                'message' => 'nullable|string',
            ]);

            // Yeh line important hai - Model boot() method user_id set kar dega
            $contact = Contact::create($data);
            
            Log::info('Contact saved. ID: ' . $contact->id . ', User ID: ' . $contact->user_id);

            // Send email
            try {
                Mail::send('emails.contact', ['data' => $data], function ($message) use ($data) {
                    $message->to('info@zawjahaa.com')
                            ->subject('New Matchmaking Request - ' . $data['full_name']);
                    $message->replyTo($data['email'], $data['full_name']);
                    $message->from(config('mail.from.address'), config('mail.from.name'));
                });
            } catch (\Exception $e) {
                Log::error('Email failed: ' . $e->getMessage());
            }

            return response()->json([
                'success' => true,
                'message' => 'Request Received!',
                'user_id_saved' => $contact->user_id
            ]);

        } catch (\Exception $e) {
            Log::error('Contact form error: ' . $e->getMessage());
            
            return response()->json([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            ], 500);
        }
    }
}