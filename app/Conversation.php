<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    protected $guarded = [];
    public $timestamps = false;

    public function users()
    {
        return $this->HasMany(User::class);
    }

    public function messages()
    {
        return $this->HasMany(Message::class);
    }

    public function addMessage($request)
    {
        Message::create([
            'user_id' => auth()->id(),
            'conversation_id' => $request->conversation->id,
            'body' => $request->body
        ]);
    }
}
