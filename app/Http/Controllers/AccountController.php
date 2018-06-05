<?php

namespace App\Http\Controllers;

use App\UserData;
use App\User;

class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['create', 'store']);
        $this->middleware('data')->except(['create', 'store', 'edit','update']);
    }


    public function create()
    {
        return view('account.create');
    }


    public function store()
    {
        $this->validate(request(), [
            "name"=>"min:3",
            "surname"=>"min:3",
            'email' => 'email|min:4|unique:users',
            'password' => 'min:4|confirmed'
        ]);

        $user = User::create([
            'email' => request('email'),
            'password' => bcrypt(request('password'))
        ]);

        UserData::create([
            'user_id'=>$user->id,
            'name'=>request('name'),
            'surname'=>request('surname'),
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
    public function update(User $user)
    {

        if ($user->id != auth()->id()) {
            return redirect('/profile/' . auth()->id() . "/edit");
        }

        $this->validate(request(),[
            "name"=>"min:3",
            "surname"=>"min:3",
            "birthday"=>"date",
        ]);

        UserData::create([
            'user_id'=>$user->id,
            'name'=>''
        ]);


        return view('account.edit', compact('user'));
    }
}
