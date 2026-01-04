<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterStoreRequest;
use App\Models\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{

    public function showRegister()
    {
        return view('auth.registration');
    }

    public function showLogin()
    {
        return view('auth.login');
    }

    public function register(RegisterStoreRequest $request)
    {
        User::create([
            'name' => $request->name,
            'email' => Str::lower($request->email),
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);

        return to_route('dashboard')->withSuccess('Registration successful. Please login.');
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (FacadesAuth::attempt(['email' => $data['email'], 'password' => $data['password']])) {
            $request->session()->regenerate();
            return view('dashboard')->with('success', 'Login successful.');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')->with('success', 'Logout successful.');
    }
}
