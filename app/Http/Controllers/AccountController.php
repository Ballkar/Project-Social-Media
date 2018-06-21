<?php

namespace App\Http\Controllers;

use App\Friendship;
use App\Post;
use App\UserData;
use App\User;
use Illuminate\Support\Facades\Storage;

class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['create', 'store']);
        $this->middleware('UserID')->only('edit', 'update');
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
            ->where('table_id', $user->table->id)
            ->get();

        foreach ($posts as $post) {
            if (strlen($post->body) > 120) {
                $post->body = substr($post->body, 0, 120) . "...";
            }
        }

        $friend = $user->isFriendWith(auth()->user());
        $asked = auth()->user()->isInvitedBy($user);
        $noConnections = !$user->isConnectedWith(auth()->user());
        return view('account.show', compact('user', 'posts', 'friend', 'asked', 'noConnections'));
    }


    public function edit(User $user)
    {

        return view('account.edit');
    }

    public function update(User $user)
    {


        $this->validate(request(), [
            "adres" => "sometimes|nullable|alpha_num",
            "birthday" => "sometimes|nullable|date"
        ]);


        $user->data->edit(request()->except(['__token']));


        return redirect('/profile/' . auth()->id());
    }
}
