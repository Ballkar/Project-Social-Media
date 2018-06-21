<?php

namespace App\Http\Controllers;

use App\Conversation;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    //
    public function store(Conversation $conversation)
    {
        $this->validate(request(), [
            'body' => 'min:2'
        ]);

        $conversation->addMessage(request());
        return back();
    }
}
