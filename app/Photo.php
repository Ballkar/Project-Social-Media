<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    //
    protected $guarded=[];

    public function Gallery()
    {
        return $this->belongsTo(Gallery::class);
    }
}
