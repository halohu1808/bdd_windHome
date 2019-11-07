<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    protected $guarded = [];

    public function room()
    {
        return $this->belongsTo('App\Room', 'roomId', 'id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'userId', 'id');
    }

    public function status()
    {
        return $this->belongsTo('App\Status', 'statusId', 'id');
    }

    public function feedbacks()
    {
        return $this->hasMany('App\Feedback');
    }

}
