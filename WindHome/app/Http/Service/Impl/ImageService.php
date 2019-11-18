<?php


namespace App\Http\Service\Impl;


use App\Http\Repository\Contract\ImageRepositoryInterface;
use App\Http\Service\ServiceInterface\ImageServiceInterface;

class ImageService implements ImageServiceInterface
{
    protected $imageRepository;


    public function __construct(ImageRepositoryInterface $imageRepository)
    {
        $this->imageRepository = $imageRepository;
    }

    public function getAll()
    {
        return $this->imageRepository->getAll();
    }

    public function store($request)
    {

        $data = $request->all();
        $this->imageRepository->store($data);
    }

    public function destroy($roomId)
    {
        $img = $this->roomRepository->findById($roomId);
        $this->roomRepository->destroy($img);
    }


    public function getFirstImageByRoomId($roomId)
    {
        return $this->imageRepository->findFirstImageByRoomId($roomId);

    }

    public function getAllImageByRoomId($roomId)
    {
        return $this->imageRepository->findAllImageByRoomId($roomId);
    }

    public function destroyImage($roomId)
    {
        return $this->imageRepository->destroyImage($roomId);
    }
}
