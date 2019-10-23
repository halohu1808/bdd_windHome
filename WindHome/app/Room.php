<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
//    protected $table = 'rooms';
    protected $guarded = [];

    public function status()
    {
        return $this->belongsTo('App\Status', 'statusId', 'id');
    }

    public function contract()
    {
        return $this->hasMany('App\Contract', 'roomId', 'id');
    }
}
