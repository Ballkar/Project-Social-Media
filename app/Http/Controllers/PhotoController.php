<?php

namespace App\Http\Controllers;

use App\Photo;
use App\User;

class PhotoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show(Photo $photo)
    {
        return view('photo.show', compact('photo'));
    }

    public function create()
    {
        return view('photo.create');
    }

    public function store()
    {

        $this->validate(request(), [
            "photo" => "image"
        ]);

        auth()->user()->gallery->AddPhoto(request());

        return redirect('/gallery/' . auth()->id() . "");
    }
}
