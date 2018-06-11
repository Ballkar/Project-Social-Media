<?php

namespace App\Http\Controllers;

use App\Photo;

class PhotoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }



    public function create()
    {
        return view('photo.create');
    }

    public function store()
    {

        $this->validate(request(), [
            "photo" => "image|required"
        ]);

        if (request('avatar')=='on'){
            auth()->user()->gallery->AddAndChangeAvatar(request());
        }else{
            auth()->user()->gallery->AddPhoto(request());
        }


        return redirect('/gallery/' . auth()->id() . "");
    }

    public function show(Photo $photo)
    {

        return view('photo.show', compact('photo'));
    }


}
