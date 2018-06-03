<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AccountController extends Controller
{
    public function create()
    {

        return view('account.create');
    }
    public function store()
    {
        $this->validate(request(),[
            'name'=>'min:4',
            'surname'=>'min:4',
            'email'=>'email|min:4',
            'password'=>'min:4|confirmed'
        ]);

        $user = User::create([
            'name'=>request('name'),
            'surname'=>request('surname'),
            'email'=>request('email'),
            'password'=>bcrypt(request('password'))
        ]);

        auth()->login($user);



        return view('table.index');
    }
}
