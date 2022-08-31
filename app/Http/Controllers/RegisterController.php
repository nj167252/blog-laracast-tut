<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => ['required', 'max:150', 'min:2'],
            'email' => ['required', 'email', 'unique:users,email', 'max:150'],
            'username' => ['required', 'unique:users,username', 'max:150', 'min:3'],
            'password' => ['required', 'min:8', 'max:150'],
        ]);

        $user = User::create($attributes);

        auth()->login($user);

        // session()->flash('success', 'Your account have been created.');

        return redirect('/')->with('success', 'Your account have been created.');
    }
}
