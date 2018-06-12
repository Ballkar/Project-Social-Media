<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Table extends Model
{
    protected $guarded=[];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function post()
    {
        return $this->HasMany(Post::class);
    }

    public function AddPost(Request $request)
    {
        Post::create([
            'user_id'=>auth()->id(),
            'table_id'=>$request->user->id,
            'body'=>$request->body
        ]);
    }

}
