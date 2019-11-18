<?php

namespace App\Http\Controllers;

use App\Contract;
use App\Http\Service\ServiceInterface\ContractServiceInterface;
use App\Http\Service\ServiceInterface\ImageServiceInterface;
use App\Http\Service\ServiceInterface\RoomServiceInterface;
use App\Room;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use function Sodium\add;

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

    public function contractDetail($contractId, $key = null)
    {

        $contract = $this->contractService->findById($contractId);
        $room = $this->roomService->findById($contract->roomId);
        $images = $this->imageService->getAllImageByRoomId($contract->roomId);

        //Time
        $rentime = $contract->rentTime;
        $startTime = strtotime($contract->startTime);
        $timeFormat = date('Y-m-d', $startTime);
        $carbonStartTime = Carbon::create($timeFormat);
        $carbonNow = Carbon::now();
        $endTime1 = $carbonStartTime->addMonth($rentime);
        $timeLeft = $endTime1->diffInDays($carbonNow);
        $endTime = $endTime1->toDateString();

        foreach (Auth::user()->notifications as $notification) {
            $notification->markAsRead();
        }

        return view('userSite.contractDetail', compact('room', 'contract', 'images', 'endTime', 'timeLeft'));
    }


}
