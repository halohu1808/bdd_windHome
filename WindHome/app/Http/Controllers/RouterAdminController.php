<?php

namespace App\Http\Controllers;

use App\Contract;
use App\Http\Service\ServiceInterface\ContractServiceInterface;
use App\Http\Service\ServiceInterface\ImageServiceInterface;
use App\Http\Service\ServiceInterface\RoomServiceInterface;
use App\Room;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RouterAdminController extends Controller
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

    public function roomAvailable()
    {
        $rooms = Room::where('statusId', 1)->get();
//        dd($rooms);
        return view('adminSite.adminSite', compact('rooms'));
    }

    public function roomRented()
    {
        $rooms = Room::where('statusId', 2)->get();
//        dd($rooms);
        return view('adminSite.adminSite', compact('rooms'));
    }

    public function roomKeeping()
    {
        $rooms = Room::where('statusId', 3)->get();
//        dd($rooms);
        return view('adminSite.adminSite', compact('rooms'));
    }

    public function roomEndRequest()
    {
        $rooms = Room::where('statusId', 4)->get();
//        dd($rooms);
        return view('adminSite.adminSite', compact('rooms'));
    }


// Hop Dong
    public function contractAll()
    {
        $contracts = Contract::all();
        return view('adminSite.contractSite', compact('contracts'));
    }

//    Hai Code
    public function contractRun()
    {
        $contracts = Contract::where('statusId', 5)->get();
        return view('adminSite.contractSite', compact('contracts'));
    }

    public function contractEnd()
    {
        $contracts = Contract::where('statusId', 6)->get();
        return view('adminSite.contractSite', compact('contracts'));
    }

    public function contractEndRequest()
    {
        $contracts = Contract::where('statusId', 8)->get();
        return view('adminSite.contractSite', compact('contracts'));

    }

    public function contractKeepRequest()
    {
        $contracts = Contract::where('statusId', 7)->get();
        return view('adminSite.contractSite', compact('contracts'));
    }

    public function contractDetail($id)
    {
        $contract = $this->contractService->findById($id);
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

        return view('adminSite.contractDetail', compact('room', 'contract', 'images', 'endTime', 'timeLeft'));
    }


//    User
    public function userAll()
    {
        $users = User::all();
        return view('adminSite.userSite', compact('users'));
    }


}
