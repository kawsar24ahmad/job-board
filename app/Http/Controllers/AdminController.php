<?php

namespace App\Http\Controllers;

use App\Models\Company;
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
            flash()
            ->options([
                'position' => 'bottom-right',
            ])
            ->success('You have logged in successfully');
            return redirect(route('admin.dashboard'));
        }
        return redirect()->back()->with('error', 'Your email or password is wrong!');
    }

    public function logout(Request $request)  {
        // Log out the admin
        Auth::guard('admin')->logout();

        // Invalidate the session
        $request->session()->invalidate();

        // Regenerate the session token
        $request->session()->regenerateToken();

        // Redirect to the login page or any desired route
        return redirect()->route('admin.login')->with('success', 'You have successfully logged out.');
   
    }
    public function dashboard()
    {
        $companies = Company::all();
        return view('admin.dashboard', compact('companies'));
    }


    public function approve($id)  {
        $company = Company::find($id);
        if (!$company) {
            return abort(404);
        }

        $company->status = 'approved';
        $company->approved_by = auth()->guard('admin')->user()->id;
        $company->save();
        flash()
            ->options([
                'position' => 'bottom-right',
            ])
            ->info('The Company has been approved');
        return back();
        
    }
    public function reject($id)  {
        $company = Company::find($id);
        if (!$company) {
            return abort(404);
        }

        $company->status = 'rejected';
        $company->save();
        flash()
            ->options([
                'position' => 'bottom-right',
            ])
            ->info('The Company has been rejected');
        return back();
        
    }
}
