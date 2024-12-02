<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{
    public function create()
    {
        return view('sessions.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'email' => 'required|exists:users,email',
            'password' => 'required'
        ]);


        if (! \Auth::attempt($attributes)) {
            throw ValidationException::withMessages([
                'email' => 'Your provided credentials could not be verified'
            ]);
        }

        session()->regenerate();

        return redirect('/')->with('Success', 'Welcome Back');

    }

    public function destroy()
    {
        auth()->logout();

        return redirect('/')->with('Success', 'Goodbye!');
    }
}
