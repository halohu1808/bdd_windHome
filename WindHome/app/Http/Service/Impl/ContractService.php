<?php


namespace App\Http\Service\Impl;

use Carbon\Carbon;
use App\Contract;
use App\Http\Repository\Contract\ContractRepositoryInterface;
use App\Http\Service\ServiceInterface\ContractServiceInterface;

class ContractService implements ContractServiceInterface
{
    protected $contractRepository;


    public function __construct(ContractRepositoryInterface $contractRepository)
    {
        $this->contractRepository = $contractRepository;
    }

    public function getAll()
    {
        return $this->contractRepository->getAll();
    }


    public function booking($request, $room, $userId)
    {
        // co roomId va rentTime
        $contract = new Contract();
        $contract->price = $room['pricePerMonth'];
        $contract->rentTime = $request->rentTime;
        $contract->userId = $userId;
        $contract->roomId = $room['id'];
        $contract->statusId = "7";

//        dd($contract);

        $this->contractRepository->save($contract);
        return $contract;

    }

    public function findById($id)
    {
        return $this->contractRepository->findById($id);
    }

    public function findByRoomId($id)
    {
//        find contract by room Id -> sai
        return $this->contractRepository->findByRoomId($id);
    }

    public function store($request, $id)
    {
        $contract = $this->contractRepository->findById($id);
        $data = $request->all();
        return $this->contractRepository->update($contract, $data);
    }

    public
    function findContractStatusRun($id)
    {
        return $this->contractRepository->findContractStatusRun($id);
    }

    public
    function save($obj)
    {
        return $this->contractRepository->save($obj);
    }

    public
    function cancel($id)
    {
        $contract = $this->contractRepository->findByRoomId($id);
        $userId = $contract[0]->userId;

        $contract[0]->delete();
        return $userId;
    }

    public
    function endContract($id)
    {
// Đây rồi bố mẹ ơi!!!!
        $currentTime = Carbon::now()->toDateString();
        $contract = $this->contractRepository->findContractStatusRun($id);
        $contract[0]->statusId = 6;
        $contract[0]->endTime = $currentTime;
        $this->contractRepository->save($contract[0]);
        return $contract[0];
    }

//    Hai code
    public
    function end($id)
    {
        //status Hop Dong
        $currentTime = Carbon::now()->toDateString();
        $contract = $this->contractRepository->findContractStatusEndRequest($id);
        $contract[0]->statusId = 6;
        $contract[0]->endTime = $currentTime;
        $this->contractRepository->save($contract[0]);
        return $contract[0];
    }

    public
    function cancelEnd($id)
    {
        $contract = $this->contractRepository->findContractStatusEndRequest($id);
        $contract[0]->statusId = "5";
//     dd($contract[0]);
        $this->contractRepository->save($contract[0]);
        return $contract[0];
    }

    public function deleteContract($contractId)
    {
        $contract = $this->findById($contractId);
        $this->contractRepository->destroy($contract);
    }

    public function cancelRoom($id)
    {
        $contract = $this->contractRepository->findById($id);
        $contract->statusId = "8";
        $this->contractRepository->save($contract);
    }

    public function extensionContract($id)
    {
        return $this->contractRepository->extensionContract($id);
    }

    public function extensionUpdate($request, $id)
    {
        $contract = $this->contractRepository->findById($id);
        $extensionTime = ($request->extensionTime);
        $rentime = (int)$extensionTime + (int)($contract->rentTime);
        $contract->rentTime = $rentime;
        $this->contractRepository->save($contract);

    }

    public function checkEmpty($id)
    {
        return $this->contractRepository->checkEmptyRoom($id);
    }
}
