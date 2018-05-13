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

    public function IsFriend($id)
    {
        return \App\Friend::where('idown', $this->id)->where('iduser', $id)->count();
    }

    public function MyObject()
    {
        $objects = \App\MyObject::all();
        $myobject = null;
        $min = 0;
        foreach ($objects as $value) {
            $myobject = $value;
            if ($min <= $this->score && $this->score < $value->totalscore) {
                return $value;
            }
            $min = $value->totalscore;
        }
        return $myobject;
    }

    public function LastQuestion()
    {
        $time = time() - 30;
        $time = date('Y-m-d H:i:s', $time);
        $LastQuestion = \App\UserChallenge::where('iduser', $this->id)
                        ->where('answered', '<>', 0)
                        ->where('created_at', '>', $time)
                        ->orderBy('id', 'desc')->first();
        return $LastQuestion;
    }

    public function RandomQuestion()
    {
        return \App\Question::where('idobject', $this->MyObject()->idobject)->inRandomOrder()->first();
    }
}
