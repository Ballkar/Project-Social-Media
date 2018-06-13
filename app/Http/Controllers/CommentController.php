<?php

namespace App\Http\Controllers;

use App\comment;
use App\Photo;
use App\Post;
use Illuminate\Support\Facades\URL;

class CommentController extends Controller
{
    //
    public function __construct()
    {
        $this->validate(request(), [
            'body' => 'min:5'
        ]);
    }

    public function PostStore(Post $post)
    {
        $post->comment(request('body'));
        return back();
    }

    public function PhotoStore(Photo $photo)
    {
        $photo->comment(request('body'));
        return back();
    }

    public function destroy(comment $comment)
    {
        $comment->delete();

        return back();
    }
    public function edit(comment $comment)
    {
        return view('comment.edit', compact('comment'));
    }

    public function update(comment $comment)
    {
        $this->validate(request(),[
            'body'=>'min:5'
        ]);

        $comment->update([
            'body'=>request('body')
        ]);
        return back();
    }
}
