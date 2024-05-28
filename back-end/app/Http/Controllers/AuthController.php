<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
class AuthController extends Controller
{
    public function showLoginPreference()
    {
        return view('auth.login-preference');
    }

    public function showVisitorLoginForm()
    {
        return view('auth.login-visitor');
    }

    public function showAdminLoginForm()
    {
        return view('auth.login-admin');
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function loginVisitor(Request $request)
    {
        $credentials = $request->only('username', 'password');
        if (Auth::attempt(array_merge($credentials, ['role' => 'visitor']))) {
            return redirect()->route('home.visitor');
        }
        $request->session()->put('loggedIn', true);
        return back()->withErrors(['username' => 'Invalid credentials']);
    }

    public function loginAdmin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $credentials = $request->only('username', 'password');
        if (Auth::attempt(array_merge($credentials, ['role' => 'admin']))) {
            return redirect()->route('dashboard.admin');
        }
        $request->session()->put('loggedIn', true);
        return back()->withErrors(['username' => 'Invalid credentials']);
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'visitor',
        ]);

        return redirect()->route('login.visitor');
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login-preference');
    }
}
