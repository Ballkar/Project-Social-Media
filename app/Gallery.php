<?php

namespace App;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

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
            "gallery_id" => $this->id,
            "path" => $path
        ]);
    }
}
