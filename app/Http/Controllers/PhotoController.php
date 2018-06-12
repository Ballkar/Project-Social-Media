<?php

namespace App\Http\Controllers;

use App\Photo;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('UserID')->only('edit','update','destroy');
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


        return redirect('/gallery/' . auth()->id());
    }

    public function show(Photo $photo)
    {
        return view('photo.show', compact('photo'));
    }
    public function edit(Photo $photo)
    {
        return view('photo.edit', compact('photo'));
    }
    public function update(Photo $photo)
    {
        $this->validate(request(),[
            'body'=>'min:5'
            ]);

        $photo->update([
            'body'=>request('body')
        ]);

        return redirect('/photo/'.$photo->id);
    }


    public function destroy(Photo $photo)
    {
        if($photo->path == $photo->gallery->avatar)
        {
            $photo->gallery->update([
                'avatar'=>"storage/images.jpg"
            ]);
        }
        unlink($photo->path);
        $photo->delete();
        return redirect('/');
    }


}
