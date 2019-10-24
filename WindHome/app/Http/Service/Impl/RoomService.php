<?php


namespace App\Http\Service\Impl;


use App\Http\Repository\Contract\RoomRepositoryInterface;
use App\Http\Service\ServiceInterface\RoomServiceInterface;
use App\Room;

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

    public function store($data)
    {
//        if($request->hasFile('image')){
//
//            $file = $request->file('image');
//            $fileName = $file->getClientOriginalName();
//            $file->move('img',$fileName);
//        } else{
//            echo "Chưa có file";
//        };

        return $this->roomRepository->store($data);

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

    //Hai-code
    public function booking($id)
    {
        $room = $this->roomRepository->findById($id);
        $room->statusId = "3";
        $this->roomRepository->save($room);
    }


    public function save($obj)
    {

        return $this->roomRepository->save($obj);
    }
}
