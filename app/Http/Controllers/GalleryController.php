<?php

namespace App\Http\Controllers;


use App\User;


class GalleryController extends Controller
{
    //

    public function show(User $user)
    {
        return view('gallery.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('gallery.edit', compact('user'));
    }

    public function update(User $user)
    {
        if ($user->id != auth()->id()) {

            return redirect('/gallery/' . auth()->id() . "/edit");
        }

        $this->validate(request(), [
            "photo" => "image"
        ]);

        $user->gallery->AddPhoto(request());

        return redirect('/gallery/' . $user->id . "");
    }
}
