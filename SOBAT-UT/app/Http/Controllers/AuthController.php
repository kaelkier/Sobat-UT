<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        if ($username === 'admin' && $password === 'admin') {
            return redirect()->route('dashboard');
        }

        return redirect()->route('login')->withErrors(['login' => 'Username atau Password salah']);
    }

    public function admin()
    {
        return view('dashboard');
    }
}

