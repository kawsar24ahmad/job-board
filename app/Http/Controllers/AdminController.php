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
}
