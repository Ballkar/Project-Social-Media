<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'surname', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function data()
    {
        return $this->hasOne(UserData::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function gallery()
    {
        return $this->hasOne(Gallery::class);
    }

    public static function AddUserAndLog($request)
    {
        $user = User::create([
            'email' => $request['email'],
            'password' => bcrypt($request['password'])
        ]);

        UserData::create([
            'user_id' => $user->id,
            'name' => $request['name'],
            'surname' => $request['surname']
        ]);

        Gallery::create([
            'user_id' => $user->id
        ]);

        auth()->login($user);
    }
}
