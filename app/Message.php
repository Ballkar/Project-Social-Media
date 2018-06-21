<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $guarded = [];

    public function Conversation()
    {
        return $this->belongsTo(Conversation::class);
    }
    public function User()
    {
        return $this->belongsTo(User::class);
    }


}
