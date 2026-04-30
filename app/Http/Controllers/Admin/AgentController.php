<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Agent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AgentController extends Controller
{
    public function index()
    {
        $agents = Agent::latest()->paginate(15);
        return view('admin.agents', compact('agents'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:agents,email',
            'phone' => 'nullable|unique:agents,phone',
            'password' => 'required|min:6',
            'gender' => 'required|in:male,female',
            'cnic' => 'nullable',
            'country' => 'nullable',
            'city' => 'nullable',
            'profile_image' => 'nullable|image',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'errors' => $validator->errors()], 422);
        }

        $imagePath = null;

        if ($request->hasFile('profile_image')) {
            $file = $request->file('profile_image');
            $name = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/agents'), $name);
            $imagePath = 'uploads/agents/' . $name;
        }

        Agent::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'gender' => $request->gender,
            'cnic' => $request->cnic,
            'country' => $request->country,
            'city' => $request->city,
            'profile_image' => $imagePath,
            'is_online' => 0,
            'last_seen' => now(),
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Agent created successfully'
        ]);
    }

    public function update(Request $request, $id)
    {
        $agent = Agent::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:agents,email,' . $id,
            'phone' => 'nullable|unique:agents,phone,' . $id,
            'gender' => 'required|in:male,female',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'errors' => $validator->errors()], 422);
        }

        $agent->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'gender' => $request->gender,
            'cnic' => $request->cnic,
            'country' => $request->country,
            'city' => $request->city,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Agent updated successfully'
        ]);
    }

    public function destroy($id)
    {
        $agent = Agent::findOrFail($id);

        if ($agent->profile_image && file_exists(public_path($agent->profile_image))) {
            unlink(public_path($agent->profile_image)); // FIXED ERROR HERE
        }

        $agent->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Agent deleted'
        ]);
    }

    public function getAgent($id)
    {
        return response()->json([
            'agent' => Agent::findOrFail($id)
        ]);
    }
}