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
        'username', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $username = 'username';

    public function Friends()
    {
        return $this->hasMany('App\Friend', 'idown', 'id');
    }

    public function Chats($userid)
    {
        return \App\Chat::where(function($query) use ($userid) {
            $query->where('idfrom', $this->id)->where('idto', $userid);
        })->orWhere(function($query) use ($userid) {
            $query->where('idto', $this->id)->where('idfrom', $userid);
        })->get();
    }

    public function IsFriend($id)
    {
        return \App\Friend::where('idown', $this->id)->where('iduser', $id)->count();
    }
}
