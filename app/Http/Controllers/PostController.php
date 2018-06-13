<?php

namespace App\Http\Controllers;

use App\comment;
use App\Post;
use App\User;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('UserID')->only('edit','update','destroy');
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
        $id = $post->id;
        $comments = comment::where('post_id','=',$id)
            ->get();


        return view('post.show',compact('post','user','id', 'comments'));
    }

    public function update(Post $post)
    {
        $this->validate(request(), [
            "body" => "min:3"
        ]);
        $post->update([
            'body'=>request('body')
        ]);

        return redirect("/post/".$post->id);
    }
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect("/");
    }

}
