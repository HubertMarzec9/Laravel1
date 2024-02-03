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
        $user = User::create(
            request()->validate([
                'name' => 'required|max:255|min:3',
                'username' => 'required|max:255|min:3|unique:users,username',
                'email' => 'required|email|max:255|min:3|unique:users,email',
                'password' => 'required|max:255|min:8',
        ]));

        auth()->login($user);

        return redirect('/')->with('success', 'Account created.');
    }
}
