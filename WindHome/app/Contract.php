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

}
