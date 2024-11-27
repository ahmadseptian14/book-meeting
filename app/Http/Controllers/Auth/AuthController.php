<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        return Inertia::render('Auth/Login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'orgeh' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('orgeh', 'password'))) {
            return redirect()->route('index');
        }

        return back()->withErrors(['email' => 'Invalid credentials.']);
    }

    public function showRegister()
    {
        return Inertia::render('Auth/Register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'orgeh' => 'required|string|unique:users',
            'password' => 'required|confirmed|min:8',
            'bagian' => 'required'
        ]);

        User::create([
            'orgeh' => $request->orgeh,
            'password' => Hash::make($request->password),
            'bagian' => $request->bagian,
        ]);

        return redirect()->route('login.view');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.view');
    }
}
