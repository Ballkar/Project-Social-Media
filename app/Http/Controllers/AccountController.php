<?php

namespace App\Http\Controllers;

use App\UserData;
use App\User;
use Illuminate\Support\Facades\Storage;

class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['create', 'store']);
    }


    public function create()
    {
        return view('account.create');
    }


    public function store()
    {
        $this->validate(request(), [
            "name" => "min:3",
            "surname" => "min:3",
            'email' => 'email|min:4|unique:users',
            'password' => 'min:4|confirmed'
        ]);

        User::AddUserAndLog(request()->all());


        return redirect('/profile/' . auth()->user()->id . '/edit');
    }


    public function show(User $user)
    {
        return view('account.show', compact('user'));
    }


    public function edit(User $user)
    {
        if ($user->id != auth()->id()) {
            return redirect('/profile/' . auth()->id() . "/edit");
        }

        return view('account.edit', compact('user'));
    }

    public function update(User $user)
    {

        if ($user->id != auth()->id()) {
            return redirect('/profile/' . auth()->id() . "/edit");
        }


        $this->validate(request(), [
            "name" => "min:3",
            "surname" => "min:3",
            "birthday" => "date",
        ]);


        return view('account.edit', compact('user'));
    }
}
