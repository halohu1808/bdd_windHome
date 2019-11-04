<?php


namespace App\Http\Repository\Eloquent;


use App\Http\Repository\Contract\ImageRepositoryInterface;
use App\Image;
use Illuminate\Support\Facades\DB;

class ImageRepositoryEloquent extends RepositoryEloquent implements ImageRepositoryInterface
{

    public function getModel()
    {
        return Image::class;
    }

    public function save($obj)
    {
        $obj->save();
    }

    public function findFirstImageByRoomId($roomId)
    {
        $image = DB::table('images')->where('roomId', $roomId)->first();
        return $image;
    }

    public function findAllImageByRoomId($roomId)
    {
        $image = Image::where('roomId', $roomId)->get();
        return $image;
    }


}
