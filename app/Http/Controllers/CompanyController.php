<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }
    public function register()  {
        return view('company.register');
    }
    public function login()  {
        return view('company.login');
    }
    public function loginForm(Request $request)  {
        $request->validate([
            'email'=> 'required|email',
            'password'=> 'required',
        ]);

        $credentials = $request->only(['email', 'password']);
        if (Auth::guard('company')->attempt($credentials)) {
            return redirect(route('company.dashboard'));
        }

        dd($request->all());
    }
    public function logout(Request $request)  {
        // Log out the admin
        Auth::guard('company')->logout(); // Use 'web' or your specific guard, if applicable

        // Invalidate the session
        $request->session()->invalidate();

        // Regenerate the session token
        $request->session()->regenerateToken();

        // Redirect to the login page or any desired route
        return redirect()->route('company.login')->with('success', 'You have successfully logged out.');
   
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:companies,email',
            'password' => 'required',
            'contact_number' => 'required|min:11',
            'website_link' => 'required',
            'address' => 'required',
        ]);

        Company::create($request->all());

        return to_route('company.login');

        // dd($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
