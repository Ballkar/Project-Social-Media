<?php

namespace App\Http\Controllers;

use App\Friendship;
use App\User;
use Illuminate\Support\Facades\Auth;

class FriendshipController extends Controller
{
    public function index(User $user)
    {
        $invitations = $user->returnInvitationsToMe();
        $myInvitations = $user->returnMyInvitations();
        $friends = $user->returnMyFriends();

        return view('friendship.index', compact('invitations', 'myInvitations', 'friends'));
    }


    public function store(User $user)
    {
        if (!$user->isConnectedWith(auth()->user())) {
            auth()->user()->invite($user);
        } elseif ($user->isConnectedWith(auth()->user())) {
            auth()->user()->acceptInvitation($user);
        }

        return back();
    }


    public function destroy(User $user)
    {

        if (auth()->user()->isInvitedBy($user)) {
            $user->deleteInvitation(auth()->user());
        } elseif ($user->isInvitedBy(auth()->user())) {
            auth()->user()->deleteInvitation($user);
        } elseif
        ($user->isFriendWith(auth()->user())) {
            auth()->user()->deleteFriendship($user);
        }


        return back();
    }
}
