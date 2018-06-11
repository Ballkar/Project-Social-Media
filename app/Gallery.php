<?php

namespace App;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use phpDocumentor\Reflection\Types\Null_;

class Gallery extends Model
{
    //
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }


    public function AddPhoto(Request $request)
    {
        $photo = $request['photo']->storePublicly('public/photo');
        $path1 = substr($photo, 13);
        $path = "storage/photo/" . $path1;

        Photo::create([
            "user_id" => auth()->id(),
            "gallery_id" => $this->id,
            "path" => $path,
            "body" => $request['body']
        ]);
    }

    public function AddAndChangeAvatar(Request $request)
    {
        $photo = $request['photo']->storePublicly('public/photo');
        $path1 = substr($photo, 13);
        $path = "storage/photo/" . $path1;

        Photo::create([
            "user_id" => auth()->id(),
            "gallery_id" => $this->id,
            "path" => $path,
            "body" => $request['body']
        ]);
        $this->update(['avatar' => $path]);;
    }

}
