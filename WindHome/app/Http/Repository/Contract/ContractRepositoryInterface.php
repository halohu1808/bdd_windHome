<?php


namespace App\Http\Repository\Contract;


interface ContractRepositoryInterface extends RepositoryInterface
{
    public function save($obj);

    public function findByRoomId($id);

    public function findContractStatusRun($id);

    public function findContractStatusEndRequest($id);

    public function findContractStatusKeepRequest($id);

    public function extensionContract($id);

    public function checkEmptyRoom($idRoom);

}
