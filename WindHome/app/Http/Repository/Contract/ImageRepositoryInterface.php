<?php


namespace App\Http\Repository\Contract;


interface ImageRepositoryInterface extends RepositoryInterface
{
    public function findFirstImageByRoomId($roomId);

    public function findAllImageByRoomId($roomId);
}
