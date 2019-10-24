<?php


namespace App\Http\Service\ServiceInterface;


interface UserServiceInterface
{
    public function getAll();

    public function store($request);

    public function update($request, $id);

    public function findById($id);

    public function destroy($id);
}
