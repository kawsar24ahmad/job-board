<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function create()  {
        return view('user.register');
    }
    public function register(Request $request)  {
        $request->validate([
            'name'=> 'required|string',
            'email'=> 'required|email|unique:users,email',
            'password'=> 'required|min:4'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ]);
       
        return redirect('/');
    }

    public function login()  {
        return    view('user.login');
    }
    public function loginForm(Request $request)  {
        $request->validate([
            'email'=> 'required|email',
            'password'=> 'required'
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return  redirect(route('home'));
        }

        return back()->with('error', 'Your email or password is not valid!');
        
    }
    public function logout()  {
         // Log out the admin
         Auth::logout();

        
         // Redirect to the login page or any desired route
         return redirect()->route('home')->with('success', 'You have successfully logged out.');
    }
}
