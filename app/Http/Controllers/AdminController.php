<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function login(Request $request)  {
        $request->validate([
            'email'=> 'required|email',
            'password'=> 'required',
        ]);

        $credentials = $request->only(['email', 'password']);
        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect(route('admin.dashboard'));
        }
        // dd($request->all());
    }

    public function logout(Request $request)  {
        // Log out the admin
        Auth::guard('admin')->logout(); // Use 'web' or your specific guard, if applicable

        // Invalidate the session
        $request->session()->invalidate();

        // Regenerate the session token
        $request->session()->regenerateToken();

        // Redirect to the login page or any desired route
        return redirect()->route('admin.login')->with('success', 'You have successfully logged out.');
   
    }
}
