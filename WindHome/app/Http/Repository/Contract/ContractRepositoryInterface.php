<?php


namespace App\Http\Repository\Contract;


interface ContractRepositoryInterface extends RepositoryInterface
{
    public function save($obj);

    public function findByRoomId($id);

}
