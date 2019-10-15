<?php


namespace App\Http\Repository\Contract;


interface RepositoryInterface
{
    public function getAll();

    public function store($data);

    public function update($obj, array $data);

    public function destroy($obj);

    public function findById($id);
}
