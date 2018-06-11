<?php

namespace App\Http\Controllers;

use App\Photo;

class AvatarController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function edit(Photo $photo)
    {
        if ($photo->user_id == auth()->id()) {

            $photo->gallery->update(['avatar' => $photo->path]);
        }
        return back();
    }
}
