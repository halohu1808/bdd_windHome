<?php


namespace App\Http\Service\ServiceInterface;


interface RoomServiceInterface
{
    public function getAll();

    public function store($request);

    public function update($request, $id);

    public function findById($id);

    public function destroy($id);

    public function booking($id);

    public function save($obj);

    public function endContract($id);

    public function changeStatusWhenCreateContract($id);

    public function changeStatusWhenNotOk($id);

    public function end($id);

    public function cancelEnd($id);
}
