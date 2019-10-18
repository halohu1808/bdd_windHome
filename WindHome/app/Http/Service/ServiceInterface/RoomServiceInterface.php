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

}
