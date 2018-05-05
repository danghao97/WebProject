<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    protected $table = 'friend';
    protected $primaryKey = ['idown', 'iduser'];
    public $incrementing = false;

    public function User()
    {
        return $this->belongsTo('App\User', 'iduser', 'id');
    }
}
