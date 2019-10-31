<?php

namespace App\Http\Controllers;

use App\Contract;
use App\Http\Requests\ContractRequest;
use App\Http\Service\ServiceInterface\ContractServiceInterface;
use App\Http\Service\ServiceInterface\RoomServiceInterface;
use Illuminate\Http\Request;

class ContractController extends Controller
{
    protected $contractService;
    protected $roomService;

    public function __construct(ContractServiceInterface $contractService, RoomServiceInterface $roomService)
    {
        $this->contractService = $contractService;
        $this->roomService = $roomService;
    }

    public function index()
    {
        $contracts = Contract::all();
        return view('contracts.listContract', compact('contracts'));
    }

    public function create()
    {
        return view('contracts.createContract');
    }

    public function run($id)
    {
//        $id = roomId
        $room = $this->roomService->findById($id);
        $contract = $this->contractService->findByRoomId($id);
        return view('contracts.editContract', compact('room', 'contract'));
    }

    public function store(ContractRequest $request, $id)
    {
        $contract = $this->contractService->findById($id);
        $this->contractService->store($request, $id);
        $roomId = $contract->room->id;
        $this->roomService->changeStatusWhenCreateContract($roomId);
        return redirect()->route('room.index');
    }

    public function cancel($id)
    {
        $this->contractService->cancel($id);
        $this->roomService->changeStatusWhenNotOk($id);
        return redirect()->route('room.index');
    }

    public function endContract($id)
    {
        $this->roomService->endContract($id);
        $this->contractService->endContract($id);
        return redirect()->route('admin.index');
    }

    public function edit()
    {
        return view('contracts.editContract');
    }

    public function underContrucction($id)
    {
        $this->roomService->underContruction($id);
        return redirect()->route('admin.index');
    }

    public function hasRoom($id)
    {
        $this->roomService->hasRoom($id);
        return redirect()->route('admin.index');
    }


    //Hai code
    public function end($id)
    {
        $this->contractService->end($id);
        $this->roomService->end($id);
    }

    public function cancelEnd($id)
    {
        $this->roomService->cancelEnd($id);
        $this->contractService->cancelEnd($id);
    }


}
