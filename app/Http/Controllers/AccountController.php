<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('destroy');
    }

    public function create()
    {
        return view('account.create');
    }

    public function store()
    {
        $this->validate(request(), [
            'name' => 'min:3',
            'surname' => 'min:3',
            'email' => 'email|min:4|unique:users',
            'password' => 'min:4|confirmed'
        ],
            [
                'min' => ':attribute musi posiadać przynajmniej 3 znaki',
                'confirmed'=>'Podane hasła nie pasują',
                'email'=>'Podano nie prawidłowy format Email',
                'unique'=>'Podany Email jest już w Bazie'
            ]);

        $user = User::create([
            'name' => request('name'),
            'surname' => request('surname'),
            'email' => request('email'),
            'password' => bcrypt(request('password'))
        ]);

        auth()->login($user);


        return redirect('/table');
    }
}
