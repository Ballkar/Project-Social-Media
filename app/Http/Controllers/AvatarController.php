<?php

namespace App\Http\Controllers;

use App\Photo;

class AvatarController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('UserID')->only('edit');
    }

    public function edit(Photo $photo)
    {
        $photo->gallery->update(['avatar' => $photo->path]);
        return back();
    }
}
