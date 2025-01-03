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

    public function properties(Request $request)
    {
        $query = Property::query();

        if ($request->filled('location')) {
            $query->where('thana', $request->location);
        }

        if ($request->filled('rent_range')) {
            [$minRent, $maxRent] = explode('-', $request->rent_range);
            $query->whereBetween('rent', [(int)$minRent, (int)$maxRent]);
        }

        if ($request->filled('sort')) {
            switch ($request->sort) {
                case 'rent_asc':
                    $query->orderBy('rent', 'asc');
                    break;
                case 'rent_desc':
                    $query->orderBy('rent', 'desc');
                    break;
                case 'type':
                    $query->orderBy('type', 'asc');
                    break;
                    case 'availability':
                        // Join with the tenant table to check for tenants
                        $query->leftJoin('tenants', 'property.property_ID', '=', 'tenants.property_ID')
                              ->select('property.*')
                              ->orderByRaw("CASE WHEN tenants.property_ID IS NULL THEN 0 ELSE 1 END ASC")
                              ->orderBy('available_from', 'asc');
                        break;

            }
        }

        $properties = $query->get();
        return view('user.properties', compact('properties'));
    }


    public function showPropertyDetailsForPublic($id)
    {
        // Fetch the property by its ID or fail with a 404 error if not found
        $property = Property::findOrFail($id);

        // Check if the property has a tenant
        $tenant = Tenant::where('property_ID', $id)->first();

        // Default payment status
        $paymentStatus = 'unpaid';
        $tenantProfilePicture = null;

        if ($tenant) {
            // Fetch the latest payment for the tenant from tenant_payments table
            $latestPayment = $tenant->tenantPayments()->latest()->first();

            // Set payment status based on the latest payment
            if ($latestPayment && $latestPayment->status == 'paid') {
                $paymentStatus = 'paid';
            }

            // Get the tenant's profile picture if available
            $tenantProfilePicture = $tenant->picture ?? null;
        }

        // Pass data to the view
        return view('user.details', compact('property', 'paymentStatus', 'tenantProfilePicture', 'tenant'));
    }


    public function service(Request $request)
    {
        // Check if there is a search query
        $query = $request->get('query', '');

        // If there is a search query, filter services
        if ($query) {
            $services = Service::where('type', 'LIKE', '%' . $query . '%')
                               ->orWhere('description', 'LIKE', '%' . $query . '%')
                               ->get();
        } else {
            // If no search query, get all services
            $services = Service::all();
        }

        // Get the service count
        $serviceCount = $services->count();

        // Pass the services and service count to the view
        return view('user.service', compact('services', 'serviceCount'));
    }

    public function landlordHome()
    {
        // Get the authenticated landlord
        $landlord = auth()->guard('landlord')->user();

        // Get the profile picture
        $profilePicture = $landlord->picture ?? null; // Assuming `picture` is a field in the landlord table

        // Pass the picture to the view
        return view('landlord.home', compact('profilePicture'));
    }

    public function tenantHome()
    {
        // Get the authenticated tenant
        $tenant = auth()->guard('tenant')->user();

        if (!$tenant) {
            return redirect()->route('login')->with('error', 'Please log in first.'); // Adjust this according to your routing
        }

        // Get the profile picture
        $profilePicture = $tenant->picture ?? null; // Assuming `picture` is a field in the tenant table

        // Pass the picture to the view
        return view('tenant.home', compact('profilePicture'));
    }

    public function visitorHome()
    {
        // Get the authenticated visitor using the 'visitor' guard
        $visitor = Auth::guard('visitor')->user();

        // Check if the visitor is authenticated
        if (!$visitor) {
            return redirect()->route('login')->with('error', 'Please log in first.'); // Adjust this according to your routing
        }

        // Get the profile picture path from the visitor object
        $profilePicture = $visitor->picture ?? null; // Ensure this field exists in the users table

        // Pass the profile picture to the view
        return view('visitor.home', compact('profilePicture'));
    }

}
