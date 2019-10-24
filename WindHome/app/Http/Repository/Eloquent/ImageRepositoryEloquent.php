<?php


namespace App\Http\Repository\Eloquent;


use App\Http\Repository\Contract\ImageRepositoryInterface;
use App\Image;

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
}
