<?php


namespace App\Http\Service\ServiceInterface;


interface ImageServiceInterface
{
    public function getFirstImageByRoomId($roomId);

    public function getAllImageByRoomId($roomId);

    public function destroyImage($roomId);


}
