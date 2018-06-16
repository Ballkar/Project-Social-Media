<?php

namespace App\Http\Controllers;

use App\Friendship;
use App\User;
use Illuminate\Support\Facades\Auth;

class FriendshipController extends Controller
{
    public function index(User $user)
    {
        //return $user->isFriendWith(auth()->user());
        $invitations = $user->returnInvitationsToMe();
        $myInvitations = $user->returnMyInvitations();
        $friends = $user->returnMyFriends();

        return view('friendship.index',compact('invitations','myInvitations','friends'));
    }

    public function store(User $user)
    {
        if (!$user->haveInvitationFrom(auth()->user())){
            auth()->user()->friend_1()->attach($user->id);
       }

    return redirect('/profile/'.$user->id)->with(compact('user'));
    }
}
