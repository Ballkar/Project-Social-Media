<?php

namespace App\Http\Controllers;

use App\Conversation;
use App\Message;
use App\User;
use Illuminate\Http\Request;

class ConversationController extends Controller
{
    protected $guarded = [];


    public function index()
    {
        $conversations = auth()->user()->returnConversations();

        return view('conversation.index', compact('conversations'));
    }
    public function store(User $user)
    {
        if ($user->haveConversationWith(auth()->user())) {
            $conversation = auth()->user()->returnConversationWith($user)->first();
            return redirect('/conversation/' . $conversation->pivot->id . "/message");
        } else {

            $conversation = Conversation::create([
                'user_id_1' => $user->id,
                'user_id_2' => auth()->id(),
            ]);
            return redirect('/conversation/' . $conversation->id . "/message");
        }
    }

    public function show(Conversation $conversation)
    {

        $user1 = auth()->user();
        if ($conversation->user_id_1 != auth()->id()){
            $user2 = User::where('id', $conversation->user_id_1)->first();
        }else{
            $user2 = User::where('id', $conversation->user_id_2)->first();
        }

        $messages = $conversation->messages;

        return view('conversation.show', compact('user1', 'user2', 'messages', 'conversation'));
    }

}
