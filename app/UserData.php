<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserData extends Model
{
    //
    protected $guarded=[];

    public function user(){
        return $this->belongsTo(User::class);
    }


    public function edit($request)
    {
        foreach ($request as $key=>$value){
            if (is_null($value) == 0){

                $this->update([
                    $key => $value
                ]);
            }
        }
    }
}
