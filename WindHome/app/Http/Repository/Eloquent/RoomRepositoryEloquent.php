<?php


namespace App\Http\Repository\Eloquent;
use App\Http\Repository\Contract\RoomRepositoryInterface;
use App\Room;

class RoomRepositoryEloquent extends RepositoryEloquent implements RoomRepositoryInterface
{

    public function getModel()
    {
        return Room::class;
    }

    public function save($obj)
    {
        return $obj->save();
    }
}
