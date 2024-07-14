<?php

namespace App\Http\Controllers;

use App\Mail\emailMailable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Models\User;

class EmailController extends Controller
{
    public function send($id)
    {
        $user = User::find($id);
        Mail::to($user->email)->send(new emailMailable($id));
        return 'Mail sent';
    }
}
