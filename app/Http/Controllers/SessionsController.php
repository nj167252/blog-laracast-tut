<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;

class SessionsController extends Controller
{
    public function create()
    {
        return view('sessions.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'email' => ['required', 'email', 'max:150'],
            'password' => ['required', 'min:8', 'max:150'],
        ]);

        if (!auth()->attempt($attributes)) {
            throw ValidationException::withMessages(
                ['email' => 'The credentials provided could not be verified.']
            );
        }

        session()->regenerate();
            return redirect('/')->with('success', 'Welcome back!');
    }
    
    public function destroy()
    {
        auth()->logout();

        return redirect('/')->with('success', 'Goodbye');
    }
}
