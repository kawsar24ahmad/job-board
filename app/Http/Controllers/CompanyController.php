<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    
    public function register()  {
        return view('company.register');
    }
    public function login()  {
        return view('company.login');
    }
    public function loginForm(Request $request)
    {
        // Validate the request data
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to retrieve the company by email
        $company = Company::where('email', $request->email)->first();

        if (!$company) {
            // Return with error if the company is not found
            return back()->with('error', 'This email is not registered.');
        }

        // Check if the company's status is approved
        if ($company->status !== 'approved') {
            return back()->with('error', 'This account is not approved.');
        }

        // Prepare credentials for authentication
        $credentials = $request->only(['email', 'password']);

        // Attempt to authenticate the company
        if (Auth::guard('company')->attempt($credentials)) {
            // Redirect to the company dashboard on successful login
            flash()
            ->options([
                'position' => 'bottom-right',
            ])
            ->success('You have logged in successfully');
            return redirect()->route('company.dashboard');
        }

        // Return with error if authentication fails
        return back()->with('error', 'Email or password does not match!');
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

    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:companies,email',
            'password' => 'required',
            'description' => 'required',
            'contact_number' => 'required|min:11',
            'website_link' => 'required',
            'address' => 'required',
        ]);

        Company::create($request->all());
        
        flash()->success('Your Company has been registered successfully');

        return to_route('company.login');

        // dd($request->all());
    }

    
    
}
