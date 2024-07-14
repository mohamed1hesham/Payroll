<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }

    public function check(Request $request)
    {

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $request->session()->regenerate();
            return redirect()->route('home');
        }

        return redirect()->back()->withErrors(['Error' => 'Invalid Email or Password']);
        dd('Redirected back with errors');
    }
    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect()->route('home');
    }
}
