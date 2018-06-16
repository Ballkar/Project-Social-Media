<?php

namespace App;

use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

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

    protected $friends;


    public function data()
    {
        return $this->hasOne(UserData::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    public function gallery()
    {
        return $this->hasOne(Gallery::class);
    }

    public function table()
    {
        return $this->hasOne(Table::class);
    }


    public static function AddUserAndLog(Request $request)
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

        Table::create([
            'user_id' => $user->id
        ]);

        auth()->login($user);
    }


    /*
     *    Znajomi
     *        |
     *        V
     */


    public function invite($user)
    {
        $this->friend_1()->attach($user->id);
    }
    public function deleteInvitation($user)
    {
        $this->friend_1()->detach($user->id);
    }

    public function acceptInvitation($user)
    {
        $friendship = $this->returnConnectionWith($user)->first();
        $friendship->pivot->status=1;
        $friendship->pivot->save();
    }
    public function deleteFriendship($user)
    {
        $this->returnConnectionWith($user)->detach($user);
    }

    public function friend_1()
    {
        return $this->belongsToMany(User::class, 'friendships', 'user_id_1', 'user_id_2')->withPivot('status');
    }

    public function friend_2()
    {
        return $this->belongsToMany(User::class, 'friendships', 'user_id_2', 'user_id_1')->withPivot('status');
    }

    public function scopeNotAccepted($query)
    {
        return $query->where('status', 0);
    }

    public function scopeAccepted($query)
    {
        return $query->where('status', 1);
    }

    public function scopeWith1($query, $user)
    {
        return $query->where('user_id_1', $user->id);
    }

    public function scopeWith2($query, $user)
    {
        return $query->where('user_id_2', $user->id);
    }

    public function returnInvitationsToMe()
    {
        return $this->friend_2()->notAccepted()->get();
    }

    public function returnMyInvitations()
    {
        return $this->friend_1()->notAccepted()->get();
    }

    public function returnMyFriends()
    {
        return $this->friend_1->merge($this->friend_2)->where('pivot.status', 1)->all();
    }

    public function returnConnectionWith($user)
    {
        if (!is_null($this->friend_1()->With2($user)->first())) {
            return $this->friend_1()->With2($user);
        } elseif (!is_null($this->friend_2()->With1($user)->first())) {
            return $this->friend_2()->With1($user);
        } else {
            return false;
        }
    }
    public function isInvitedBy($user)
    {
        if (!is_null($this->friend_2()->With1($user)->first())) {
            return true;
        }  else {
            return false;
        }
    }

//      check if users have connection in database
//      if they have return true
//      if not return false
//      $user1 ->isInvited($user2)
    public function isConnectedWith($user)
    {
        if (!is_null($this->friend_1()->With2($user)->first())) {
            return true;
        } elseif (!is_null($this->friend_2()->With1($user)->first())) {
            return true;
        } else {
            return false;
        }
    }

//      check if users are friends
//      if they are return true
//      if not return false
//      $user1 ->isFriendWith($user2)
    public function isFriendWith($user)
    {
        if (!is_null($this->friend_1()->With2($user)->Accepted()->first())){
            return true;
        }
        elseif(!is_null($this->friend_2()->With1($user)->Accepted()->first())){
            return true;
        }else{
            return false;
        }
    }


}
