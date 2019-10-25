<?php

namespace App\Http\Controllers;

use App\Contract;
use App\Http\Service\ServiceInterface\ContractServiceInterface;
use App\Http\Service\ServiceInterface\RoomServiceInterface;
use App\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RouterAdminController extends Controller
{

    protected $roomService;
    protected $contractService;

    public function __construct(RoomServiceInterface $roomService, ContractServiceInterface $contractService)
    {
        $this->roomService = $roomService;
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
        //dd($contracts);
        return view('adminSite.contractSite', compact('contracts'));
    }

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

//    User



}
