<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public function room()
    {
        return $this->belongsTo('App\Room', 'roomId', 'id');
    }
}
