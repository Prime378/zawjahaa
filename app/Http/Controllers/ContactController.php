<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function showForm()
    {
        return view('contact');
    }

    public function submitForm(Request $request)
    {
        $data = $request->validate([
            'full_name' => 'required|string|max:255',
            'phone' => 'required|string|max:50',
            'email' => 'required|email|max:255',
            'looking_for' => 'nullable|string|max:50',
            'age' => 'nullable|integer',
            'location' => 'nullable|string|max:255',
            'profession' => 'nullable|string|max:255',
            'service' => 'nullable|string|max:255',
            'message' => 'nullable|string',
        ]);

        // Save to database
        $contact = Contact::create($data);

        // Send email
        Mail::send('email.contact', ['data' => $data], function ($message) use ($data) {
            $message->to('info@zawjahaa.com', 'Matchmaker')
                    ->subject('New Matchmaking Request from ' . $data['full_name']);
            $message->from('info@zawjahaa.com', 'Zawjahaa');
        });

        // Return success
        return response()->json([
            'success' => true,
            'message' => 'Request Received! One of our matchmakers will contact you within 24 hours.'
        ]);
    }
}