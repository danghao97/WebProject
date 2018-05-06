<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $table = 'chat';
    protected $primaryKey = ['idfrom', 'idto'];
    public $incrementing = false;

    public function From()
    {
        return $this->belongsTo('App\User', 'idfrom', 'id');
    }

    public function To()
    {
        return $this->belongsTo('App\User', 'idto', 'id');
    }

    public function IsFromMe()
    {
        return \Auth::user()->id == $this->idfrom;
    }

    public function Messages($userid)
    {
        return \App\Chat::where('idfrom', \Auth::user()->id)->where('idto', $userid);
    }
}
