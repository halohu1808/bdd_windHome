<?php

namespace App\Http\Controllers;

use App\Contract;
use App\Http\Service\ServiceInterface\ContractServiceInterface;
use App\Http\Service\ServiceInterface\ImageServiceInterface;
use App\Http\Service\ServiceInterface\RoomServiceInterface;
use App\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RouterUserController extends Controller
{
    protected $roomService;
    protected $contractService;
    protected $imageService;

    public function __construct(RoomServiceInterface $roomService, ImageServiceInterface $imageService, ContractServiceInterface $contractService)
    {
        $this->roomService = $roomService;
        $this->imageService = $imageService;
        $this->contractService = $contractService;
    }

    public function userSite()
    {
        return view('userSite.userSite');
    }

    public function allContract()
    {
        $userId = Auth::user()->id;
        $contracts = Contract::where('userId', $userId)->get();

        return view('userSite.contractSite', compact('contracts'));
    }

    public function contractRun()
    {
        $userId = Auth::user()->id;
        $contracts = Contract::where('userId', $userId)->where('statusId', 5)->get();
        $room = $this->roomService->findById($contracts->roomId);
        dd($room);
        return view('userSite.contractSite', compact('contracts'));
    }

    public function contractKeepRequest()
    {
        $userId = Auth::user()->id;
        $contracts = Contract::where('userId', $userId)->where('statusId', 7)->get();
        return view('userSite.contractSite', compact('contracts'));
    }

    public function contractEndRequest()
    {
        $userId = Auth::user()->id;
        $contracts = Contract::where('userId', $userId)->where('statusId', 8)->get();
        return view('userSite.contractSite', compact('contracts'));
    }

    public function contractEnd()
    {
        $userId = Auth::user()->id;
        $contracts = Contract::where('userId', $userId)->where('statusId', 6)->get();
        return view('userSite.contractSite', compact('contracts'));
    }

    public function contractDetail($contractId)
    {
        $contract = $this->contractService->findById($contractId);
        $room = $this->roomService->findById($contract->roomId);
        $images = $this->imageService->getAllImageByRoomId($contract->roomId);
        return view('userSite.contractDetail', compact('room','contractId','images'));

    }


}
