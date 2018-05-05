<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'question';
    protected $primaryKey = 'id';

    public function Type()
    {
        return $this->belongsTo('App\Type', 'idtype', 'idtype');
    }

    public function Level()
    {
        return $this->belongsTo('App\Level', 'idlevel', 'idlevel');
    }

    public function Answer()
    {
        return $this->belongsTo('App\Answer', 'idanswer', 'idanswer');
    }

    public function MyObject()
    {
        return $this->belongsTo('App\MyObject', 'idobject', 'idobject');
    }
}
