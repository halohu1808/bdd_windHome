<?php


namespace App\Http\Service\ServiceInterface;


interface ContractServiceInterface
{
// public function store($request);

    public function booking($request, $room, $userId);

    public function store($request, $id);

    public function findById($id);

    public function findByRoomId($id);

    public function findContractStatusRun($id);

    public function getAll();

    public function save($obj);

    public function cancel($id);

    public function endContract($id);

    public function end($id);

    public function cancelEnd($id);

    public function deleteContract($id);

    public function cancelRoom($id);

    public function extensionContract($id);

    public function extensionUpdate($request, $id);

    public function checkEmpty($id);

}
