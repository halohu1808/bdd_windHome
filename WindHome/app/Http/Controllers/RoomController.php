<?php

namespace App\Http\Controllers;

use App\Http\Requests\createRoom;
use App\Http\Service\Impl\RoomService;
use App\Http\Service\ServiceInterface\RoomServiceInterface;
use App\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    protected $roomService;

    public function __construct(RoomServiceInterface $roomService)
    {
        $this->roomService = $roomService;
    }
    public function list()
    {
        $rooms=$this->roomService->getAll();
        return view('listSite.listPage',compact('rooms'));
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
        return view('adminSite.createRoom',compact('data'));
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
    public function booking($id){
        $this->roomService->booking($id);

    }


}
