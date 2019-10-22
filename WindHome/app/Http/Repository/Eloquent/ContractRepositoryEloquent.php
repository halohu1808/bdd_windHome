<?php


namespace App\Http\Repository\Eloquent;


use App\Contract;
use App\Http\Repository\Contract\ContractRepositoryInterface;

class ContractRepositoryEloquent extends RepositoryEloquent implements ContractRepositoryInterface
{

    public function getModel()
    {
        return Contract::class;
    }

    public function save($obj)
    {
        return $obj->save();
    }

    public function findByRoomId($id)
    {
        return $contract = Contract::where('userId', $id)->get();
    }
}
