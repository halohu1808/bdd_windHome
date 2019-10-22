<?php


namespace App\Http\Service\Impl;


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


    public function booking($request,$room,$userId)
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

    }
}
