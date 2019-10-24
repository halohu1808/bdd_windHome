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

}
