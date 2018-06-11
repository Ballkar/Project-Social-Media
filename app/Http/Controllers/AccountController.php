<?php

namespace App\Http\Controllers;

use App\Post;
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

        User::AddUserAndLog(request());


        return redirect('/profile/' . auth()->user()->id . '/edit');
    }


    public function show(User $user)
    {
        $posts = Post::latest()
        ->where('table_id',$user->table->id)
        ->get();

        return view('account.show', compact('user','posts'));
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
            "adres"=>"sometimes|nullable|alpha_num",
            "birthday" => "sometimes|nullable|date"
        ]);


        $user->data->edit(request()->except(['__token']));


        return view('account.edit', compact('user'));
    }
}
