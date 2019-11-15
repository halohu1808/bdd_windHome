<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $guarded = ['images'];
//    protected $table = 'roomsSeeder';


    public function images()
    {
        return $this->hasMany('App\Image', 'roomId', 'id');
    }
    public function status()
    {
        return $this->belongsTo('App\Status','statusId','id');
    }

    public function contract()
    {
        return $this->hasMany('App\Contract', 'roomId', 'id');
    }
    public function city()
    {
        return $this->belongsTo('App\City', 'cityId', 'id');
    }
}
