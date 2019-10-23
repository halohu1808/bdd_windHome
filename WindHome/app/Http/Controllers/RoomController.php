<?php

namespace App\Http\Controllers;

use App\Http\Requests\createRoom;
use App\Http\Service\ServiceInterface\ContractServiceInterface;
use App\Http\Service\ServiceInterface\RoomServiceInterface;
use App\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class
RoomController extends Controller
{
    protected $roomService;
    protected $contractService;

    public function __construct(RoomServiceInterface $roomService, ContractServiceInterface $contractService)
    {
        $this->roomService = $roomService;
        $this->contractService = $contractService;
    }

    public function list()
    {
        $rooms = $this->roomService->getAll();
        return view('listSite.listPage', compact('rooms'));
    }

    public function index()
    {
        $rooms = $this->roomService->getAll();
        return view('adminSite.adminSite', compact('rooms'));
    }

    public function create()
    {
        $jsonString = file_get_contents(base_path('public/city.json'));
        $data = json_decode($jsonString, true);
//        dd($data[0]['name']);
        return view('adminSite.createRoom', compact('data'));
    }

    public function store(createRoom $request)
    {
        $this->roomService->store($request);
        return redirect()->route('room.index');
    }

    public function show($id)
    {
        $room = $this->roomService->findById($id);
        return view('listSite.roomDetail', compact('room'));
    }

    public function edit($id)
    {
        $room = $this->roomService->findById($id);
        return view('rooms.edit', compact('room'));
    }

    public function update(createRoom $request, $id)
    {
        $this->roomService->update($request, $id);
        return redirect()->route('room.index');
    }

    public function destroy($id)
    {
        $this->roomService->destroy($id);
        return redirect()->route('room.index');
    }

    //Hai-code
    public function booking(Request $request)
    {
        $userId = Auth::user()->id;
        $room = $this->roomService->findById($request->roomId);
        $this->roomService->booking($request->roomId);
        $room = $this->roomService->findById($request->roomId);
        $this->contractService->booking($request,$room,$userId);

        $room = $this->roomService->findById($request->roomId);
        return view('listSite.roomDetail', compact('room'));
    }


}
