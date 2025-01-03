<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth; // Import Auth facade
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Log;
use App\Models\Landlord;
use App\Models\Tenant;
use App\Models\Property;
use GuzzleHttp\Client;
use App\Models\Service;
use App\Models\VisitRequest;


class UserController extends Controller
{
    public function index()
    {
        return view('user.home');
    }

    public function signup()
    {
        return view('user.signup'); // Ensure this path matches your view file
    }
    public function signupSubmit(Request $request)
    {
        // Validate the input data
        $validatedData = $request->validate([
            'full_name' => 'required|string|max:255',
            'current_address' => 'required|string|max:255',
            'phone_number' => 'required|numeric|digits_between:10,15',
            'account_type' => 'required|in:landlord,visitor',
            'email' => 'required|email|unique:users,email|unique:landlord,email',
            'password' => [
                'required',
                'confirmed',
                Password::min(8)
                    ->mixedCase()
                    ->letters()
                    ->numbers()
                    ->symbols()
            ],
            'picture' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        // Get the email address from the validated data
        $email = $validatedData['email'];

        // Abstract API validation code...

        // Store the profile picture
        $picturePath = $request->file('picture')->store('profile_pictures', 'public');

        // Handle account creation based on account type (landlord or visitor)
        if ($validatedData['account_type'] === 'landlord') {
            $landlord = Landlord::create([
                'name' => $validatedData['full_name'],
                'current_address' => $validatedData['current_address'],

                'email' => $validatedData['email'],
                'phone' => $validatedData['phone_number'],
                'password' => Hash::make($validatedData['password']),
                'picture' => $picturePath,
                'account_type' => 'landlord'
            ]);

            // Log the landlord in using the default web guard
            Auth::guard('landlord')->login($landlord); // For landlords

            // Debugging: Log the authentication session
            Log::info('Landlord logged in successfully', ['landlord_id' => $landlord->id]);

            // Redirect to the landlord's homepage
            return redirect()->route('landlord.user_home')->with('success', 'Registration successful!');
        } else {
            $user = User::create([
                'full_name' => $validatedData['full_name'],
                'current_address' => $validatedData['current_address'],
                'phone_number' => $validatedData['phone_number'],
                'account_type' => 'visitor',
                'email' => $validatedData['email'],
                'password' => Hash::make($validatedData['password']),
                'picture' => $picturePath
            ]);

            // Log the user in using the default web guard
            Auth::guard('visitor')->login($user); // For visitors

            // Debugging: Log the authentication session
            Log::info('Visitor logged in successfully', ['user_id' => $user->id]);

            // Redirect to the visitor's homepage
            return redirect()->route('visitor.user_home')->with('success', 'Registration successful!');
        }
    }

    // UserController.php
    public function showLoginForm()
    {
        return view('user.login'); // Return the login view
    }


    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        Log::info('Login attempt for email: ' . $request->email);

        // Attempt to find a landlord
        $landlord = Landlord::where('email', $request->email)->first();
        if ($landlord) {
            Log::info('Landlord found: ' . $landlord->email);

            if (Auth::guard('landlord')->attempt($request->only('email', 'password'))) {
                Log::info('Landlord login successful: ' . $landlord->email);
                return redirect()->route('landlord.user_home')->with('success', 'Logged in successfully as landlord!');
            } else {
                Log::warning('Landlord login failed: Invalid credentials');
                return back()->withErrors(['email' => 'Invalid landlord credentials. Please try again.'])->withInput();
            }
        }

        // Attempt to find a visitor
        $visitor = User::where('email', $request->email)->first();
        if ($visitor) {
            Log::info('Visitor found: ' . $visitor->email);
            if (Auth::guard('visitor')->attempt($request->only('email', 'password'))) {
                Log::info('Visitor login successful: ' . $visitor->email);
                return redirect()->route('visitor.user_home')->with('success', 'Logged in successfully as visitor!');
            } else {
                Log::warning('Visitor login failed: Invalid credentials');
                return back()->withErrors(['email' => 'Invalid visitor credentials. Please try again.'])->withInput();
            }
        }

        // Attempt to find a tenant
        $tenant = Tenant::where('email', $request->email)->first();
        if ($tenant) {
            Log::info('Tenant found: ' . $tenant->email);

            if (Auth::guard('tenant')->attempt($request->only('email', 'password'))) {
                Log::info('Tenant login successful: ' . $tenant->email);
                return redirect()->route('tenant.user_home')->with('success', 'Logged in successfully as tenant!');
            } else {
                Log::warning('Tenant login failed: Invalid credentials');
                return back()->withErrors(['email' => 'Invalid tenant credentials. Please try again.'])->withInput();
            }



        }

        Log::warning('No user found for email: ' . $request->email);

        // If no user is found
        return back()->withErrors(['email' => 'No user found with that email. Please check your credentials and try again.'])->withInput();
    }



}
