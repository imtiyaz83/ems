<?php
// app/Http/Controllers/Auth/LoginController.php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('home');
    }

    public function login(Request $request)
    {
        // Validate the request
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Prepare the credentials
        $credentials = $request->only('email', 'password');

        try {
            // Attempt to authenticate the user
            if (Auth::attempt($credentials)) {
                // Authentication passed
                $request->session()->put('loginId', Auth::id());
                return redirect()->route('dashboard'); // Redirect to the dashboard
            }

            // Authentication failed
            return back()->with('error', 'Invalid email or password');
        } catch (\Exception $e) {
            // Handle any unexpected errors
            return back()->with('error', 'An error occurred during login. Please try again later.');
        }
    }


    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
