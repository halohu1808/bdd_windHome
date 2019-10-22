<?php


namespace App\Http\Service\ServiceInterface;


interface ContractServiceInterface
{
// public function store($request);

    public function booking($request, $room, $userId);

    public function store($request);

    public function findById($id);

    public function findByRoomId($id);

}
