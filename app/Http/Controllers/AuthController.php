<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
// use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class AuthController extends Controller
{
    public function index()
    {
       return view('auth.form_login');
    }

    public function login_action(Request $request)
    {
        $credentials = $request->validate([
            'email'     => ['required', 'email:dns'],
            'password' => ['required']
        ]);

        // dd($credentials);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $role = Auth::user()->role;
            // dd($role);
            if($role == '1')
            {
                return redirect()->route('dashboard_gardener');
            
            } else if($role == '2') 
                {
                    return redirect()->route('dashboard_designer');

                }  else if($role == '3')
                    {
                        return redirect()->route('dashboard_user');
                    }
 
        }

        // dd(Auth());

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
 
        request()->session()->invalidate();
 
        request()->session()->regenerateToken();
 
        return redirect('/login');
    }
}
