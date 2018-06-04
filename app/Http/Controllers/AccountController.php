<?php

namespace App\Http\Controllers;

use Faker\Provider\Image;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Storage;

class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['create', 'store']);
        $this->middleware('data')->except(['create', 'store', 'edit']);
    }


    public function create()
    {
        return view('account.create');
    }


    public function store()
    {
        $this->validate(request(), [
            'email' => 'email|min:4|unique:users',
            'password' => 'min:4|confirmed'
        ]);

        $user = User::create([
            'email' => request('email'),
            'password' => bcrypt(request('password'))
        ]);

        auth()->login($user);


        return redirect('/profile/' . $user->id . '/edit');
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
}
