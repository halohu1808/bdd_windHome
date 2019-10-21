<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = 'statuses';

    public function rooms()
    {
        return $this->hasMany('App\Room','statusId','id');
    }
}
