<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function showChooseLogin()
    {
        return view('auth.choose-login');
    }

    public function showVisitorLoginForm()
    {
        return view('auth.login', ['role' => 'visitor']);
    }

    public function showAdminLoginForm()
    {
        return view('auth.login', ['role' => 'admin']);
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('username', 'password');
        $role = $request->input('role');

        $user = User::where('username', $credentials['username'])->where('password', $credentials['password'])->where('role', $role)->first();

        if ($user) {
            Auth::login($user);
            if ($role === 'admin') {
                return redirect('/dashboard');
            }
            return redirect('/home');
        }

        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ]);
    }
}