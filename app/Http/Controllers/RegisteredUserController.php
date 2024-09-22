<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('auth.register'); // Make sure you have the 'auth.register' view
    }


    public function store()
    {
        $UserData = request()-> validate([
            'name' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required','confirmed', Password::min(6)],
        ]);

        $newUser = User::create($UserData);

        Auth::login($newUser);

        return redirect(route('appointments.index'));
    }

}
