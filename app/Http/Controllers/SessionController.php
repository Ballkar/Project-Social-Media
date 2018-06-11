<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('destroy');
    }


    public function destroy()
    {
        auth()->logout();

        return view('guest.index');
    }

    public function create()
    {
        return view('session.create');
    }

    public function store()
    {
        if (!(auth()->attempt(request(['email', 'password'])))) {
            echo 'dupa';
            return back()->withErrors('Podano niepoprawny login lub hasło');
        }else {
            return redirect('/table');
        }
    }
}
