<?php

namespace App\Http\Controllers;

use App\Models\User;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => ['required', 'min:7', 'max:255'],
            'username' => ['required', 'min:3', 'max:255', 'unique:users'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'], // alternative approach
            'password' => ['required', 'min:6', 'max:255'],
        ]);

        User::create($attributes);

        // TODO: Sign in user

        session()->flash('success', 'Your account has been created.');

        return redirect('/');
    }
}
