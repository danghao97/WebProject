<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserChallenge extends Model
{
    protected $table = 'userchallenge';
    protected $primaryKey = 'id';

    public function Question() {
        return $this->belongsTo('App\Question', 'idquestion', 'id');
    }

    public function User() {
        return $this->belongsTo('App\User', 'iduser', 'id');
    }
}
