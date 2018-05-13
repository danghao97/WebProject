<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Chart extends Model
{
    public static function WorldChart()
    {
        return \App\User::orderBy('score', 'desc')->get();
    }

    public static function FriendChart()
    {
        $idfriends = \App\Friend::select('iduser')->where('idown', Auth::user()->id)->pluck('iduser');
        return \App\User::whereIn('id', $idfriends)->orWhere('id', Auth::user()->id)->orderBy('score', 'desc')->get();
    }
}
