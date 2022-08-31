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
            // 'email' => ['required', 'email', 'exists:users,email', 'max:150'], potential security risks telling people an email does not exists
            'email' => ['required', 'email', 'max:150'],
            'password' => ['required', 'min:8', 'max:150'],
        ]);

        if (auth()->attempt($attributes)) { // auth()->attempt() checks to see if a user exists and logs the uers in if found
            session()->regenerate();
            // session()->flash('success', 'Welcome back!');
            return redirect('/')->with('success', 'Welcome back!');
        }
        
        // return back() option 1
        //     ->withInput()
        //     ->withErrors(['email' => 'The credentials provided could not be verified.']); 

        throw ValidationException::withMessages(
            ['email' => 'The credentials provided could not be verified.']
        );
    }
    
    public function destroy()
    {
        auth()->logout();

        return redirect('/')->with('success', 'Goodbye');
    }
}
