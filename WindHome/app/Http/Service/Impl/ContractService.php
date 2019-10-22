<?php


namespace App\Http\Service\Impl;


use App\Http\Repository\Contract\ContractRepositoryInterface;
use App\Http\Service\ServiceInterface\ContractServiceInterface;

class ContractService implements ContractServiceInterface
{
    protected $contractRepository;

    public function __construct(ContractRepositoryInterface $contractRepository)
    {
        $this->contractRepository = $contractRepository;
    }


    public function store($request)
    {
        $data = $request->all();
        $this->contractRepository->store($data);
    }
}
