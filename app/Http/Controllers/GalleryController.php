<?php

namespace App\Http\Controllers;


use App\Gallery;
use App\Photo;
use App\User;


class GalleryController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show(Gallery $gallery)
    {
        $photos = Photo::latest()
            ->where('gallery_id',$gallery->id)
            ->get();

        return view('gallery.show', compact('gallery','photos'));
    }

}
