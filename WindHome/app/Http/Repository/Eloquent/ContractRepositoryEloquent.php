<?php


namespace App\Http\Repository\Eloquent;


use App\Contract;
use App\Http\Repository\Contract\ContractRepositoryInterface;
use Illuminate\Support\Facades\DB;

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
        return $contract = Contract::where('roomId', $id)->where('statusId', 7)->get();
    }

    public function findContractStatusRun($id)
    {
        return $contract = Contract::where('roomId', $id)->where('statusId', 5)->get();
    }

    public function findContractStatusEndRequest($id)
    {
        return $contract = Contract::where('roomId', $id)->where('statusId', 8)->get();
    }

    public function findContractStatusKeepRequest($id)
    {
        return $contract = Contract::where('roomId', $id)->where('statusId', 3)->get();
    }

    public function extensionContract($id)
    {
        return $contract = Contract::where('roomId', $id)->where('statusId', 5)->get();
    }

    public function checkEmptyRoom($idRoom)
    {
        $contract = Contract::where('roomId', $idRoom)->get();
        return $contract;
    }
}
