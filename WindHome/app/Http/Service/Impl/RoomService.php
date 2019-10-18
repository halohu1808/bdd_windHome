<?php


namespace App\Http\Service\Impl;


use App\Http\Repository\Contract\RoomRepositoryInterface;
use App\Http\Service\ServiceInterface\RoomServiceInterface;

class RoomService implements RoomServiceInterface
{
    protected $roomRepository;

    public function __construct(RoomRepositoryInterface $roomRepository)
    {
        $this->roomRepository = $roomRepository;
    }

    public function getAll()
    {
        return $this->roomRepository->getAll();
    }

    public function store($request)
    {
        $data = $request->all();
        $this->roomRepository->store($data);
    }

    public function update($request, $id)
    {
        $room = $this->roomRepository->findById($id);
        $data = $request->all();
        $this->roomRepository->update($room, $data);
    }

    public function findById($id)
    {
        return $this->roomRepository->findById($id);
    }

    public function destroy($id)
    {
        $room = $this->roomRepository->findById($id);
        $this->roomRepository->destroy($room);
    }


    public function booking($id)
    {
        $room = $this->roomRepository->findById($id);
        $room->status = "2";
    }

    public function save($obj)
    {
        return $this->roomRepository->save($obj);
    }
}
