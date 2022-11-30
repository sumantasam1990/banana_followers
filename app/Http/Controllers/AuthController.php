<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function registerPost(Request $request)
    {
        $request->validate([
            'fname' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|max:32',
            'password_confirmation' => 'required'
        ]);

        $user = new User;
        $user->name = $request->fname;
        $user->email = $request->email;
        $user->password = Hash::make($request->password_confirmation);
        $user->save();

        return redirect(route('auth.login'));
    }

    public function login()
    {
        return view('auth.login');
    }

    public function loginPost(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],

        ]);

        if (Auth::attempt($credentials, true)) {
            $request->session()->regenerate();
            return redirect()->intended('u/add/funds');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records. Please try again with different email or password.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(route('auth.login'));
    }
}
