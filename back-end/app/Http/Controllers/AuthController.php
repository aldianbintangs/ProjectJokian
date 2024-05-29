<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

// controller untuk login dan register
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
        // validasi inputan
        $credentials = $request->only('username', 'password');
        if (Auth::attempt(array_merge($credentials, ['role' => 'visitor']))) {
            return redirect()->route('home.visitor');
        }
        //session dimulai
        $request->session()->put('loggedIn', true);
        //redirect ke halaman login visitor dengan peringatan
        return back()->withErrors(['username' => 'Invalid credentials']);
    }

    public function loginAdmin(Request $request)
    {
        // validasi inputan
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required|min:6',
        ]);
        // jika validasi gagal
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        // validasi inputan
        $credentials = $request->only('username', 'password');
        if (Auth::attempt(array_merge($credentials, ['role' => 'admin']))) {
            return redirect()->route('dashboard.admin');
        }
        //session dimulai
        $request->session()->put('loggedIn', true);
        //redirect ke halaman login admin dengan peringatan
        return back()->withErrors(['username' => 'Invalid credentials']);
    }

    public function register(Request $request)
    {
        // validasi inputan
        $validator = Validator::make($request->all(), [
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
        // jika validasi gagal
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // simpan data user ke database
        User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'visitor',
        ]);

        //return ke halaman login visitor
        return redirect()->route('login.visitor');
    }

    public function logout(Request $request)
    {
        //session dihapus
        $request->session()->flush();
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        //redirect ke halaman login preference
        return redirect('/login-preference');
    }
}
