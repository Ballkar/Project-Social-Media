<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $guarded = [];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function table()
    {
        return $this->belongsTo(Table::class);
    }

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    public function comment($body)
    {
        comment::create([
            'user_id' => auth()->id(),
            'post_id' => $this->id,
            'body' => $body
        ]);
    }
}
