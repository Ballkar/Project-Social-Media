<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(User $user)
    {

        $this->validate(request(), [
            "body" => "min:3"
        ]);
        $user->table->AddPost(request());

        return back();
    }

    public function edit(Post $post)
    {
        return view('post.edit',compact('post'));
    }
    public function show(Post $post)
    {
        $user = $post->user;
        return view('post.show',compact('post','user'));
    }

    public function update(Post $post)
    {
        if ($post->user->id != auth()->id()) {
            return redirect('/profile/' . auth()->id() . "/edit");
        }
        $this->validate(request(), [
            "body" => "min:3"
        ]);
        $post->update([
            'body'=>request('body')
        ]);

        return redirect("/post/".$post->id);
    }
    public function delete(Post $post)
    {
        if ($post->user->id != auth()->id()) {
            return redirect('/profile/' . auth()->id() . "/edit");
        }

        $post->delete();

        return redirect("/");
    }
}
