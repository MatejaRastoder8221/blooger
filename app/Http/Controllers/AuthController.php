<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }
    public function authenticate()
    {
        $validated = request()->validate([
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        if (auth()->attempt($validated)) {
            request()->session()->regenerate();

            // Log user login
            \Log::channel('admin')->info('User logged in', ['email' => $validated['email']]);

            return redirect()->route('dashboard')->with('success', 'Successfully logged in!');
        }

        return redirect()->route('login')->withErrors(['email' => 'No user found with the matching email!']);
    }
    public function logout()
    {
        auth()->logout();
        \request()->session()->invalidate();

        return redirect()->route('dashboard')->with('success','Logged out successfully!');
    }
    public function register()
    {
        return view('auth.register');
    }
    public function store()
    {
        $validated = request()->validate([
            'name' => 'required|min:3|max:40',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:8'
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        // Log user registration
        \Log::channel('admin')->info('User registered', ['email' => $validated['email']]);

        return redirect()->route('dashboard')->with('success', 'Account registered successfully!');
    }
}
