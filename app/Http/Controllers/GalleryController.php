<?php

namespace App\Http\Controllers;


use App\Photo;
use App\User;


class GalleryController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show(User $user)
    {
        $photos = Photo::latest()
            ->where('gallery_id',$user->gallery->id)
            ->get();

        return view('gallery.show', compact('user','photos'));
    }

}
