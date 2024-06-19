<?php

namespace App\Http\Controllers;

use App\Models\Speaker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class SpeakerController extends Controller
{

    public function getRegister()
    {
        return view('register');
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:speakers,email',
            'password' => 'required|string|max:10',
            'bio' => 'required|string',
        ]);

        try {
            
            // Hash the password
            $hashedPassword = Hash::make($request->input('password'));

            // Create a new Speaker instance
            Speaker::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => $hashedPassword,
                'bio' => $request->input('bio'),
            ]);
            // Flash success message to the session
            $request->session()->flash('success', 'You have been registered successfully!');

            // Redirect back to the login page
            return redirect('/');

        } catch (\Exception $e) {
            // Handle any exceptions that occur during the process
            // Log the error or handle it as needed
            return back()->withInput()->with('error', 'An error occurred while registering. Please try again.');
        }
    }

    public function speakerTest(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:speakers,email',
            'password' => 'required|string|max:10',
            'bio' => 'required|string',
        ]);

        try {
            // Hash the password
            $hashedPassword = Hash::make($request->input('password'));

            // Create a new Speaker instance
            $speaker = Speaker::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => $hashedPassword,
                'bio' => $request->input('bio'),
            ]);

            // Return a JSON response indicating success
            return response()->json([
                'message' => 'Registration successful.',
                'speaker' => $speaker
            ], 201); // HTTP status code 201 for resource created

        } catch (\Exception $e) {
            // Handle any exceptions that occur during the process
            // Log the error or handle it as needed
            return response()->json([
                'error' => 'An error occurred while registering. Please try again.',
                'details' => $e->getMessage()
            ], 500); // HTTP status code 500 for internal server error
        }
    }


}
