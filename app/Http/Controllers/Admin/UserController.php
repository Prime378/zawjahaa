<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;


class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->paginate(20);
        return view('admin.users', compact('users'));
    }
    
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        
        // Admin khud ko delete nahi kar sakta
        if ($user->id === auth()->id()) {
            return back()->with('error', 'Aap apna account delete nahi kar sakte');
        }
        
        $user->delete();
        return back()->with('success', 'User deleted successfully');
    }
    
    public function updateRole($id)
    {
        $user = User::findOrFail($id);
        
        // Admin khud ka role change kar sakta hai
        if ($user->id === auth()->id()) {
            return back()->with('error', 'Aap apna role change nahi kar sakte');
        }
        
        $user->role = request('role');
        $user->save();
        
        return back()->with('success', 'Role updated successfully');
    }
}