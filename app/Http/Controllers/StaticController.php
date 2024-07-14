<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class StaticController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if (isset($user)) {


            return view('first', ['user' => $user->name]);
        } else {
            return view('first');
        }
    }

    public function sign()
    {
        return view('contact.create');
    }
}
