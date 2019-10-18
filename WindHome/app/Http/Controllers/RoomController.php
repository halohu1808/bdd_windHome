<?php

namespace App\Http\Controllers;

use App\Http\Requests\createRoom;
use App\Http\Service\Impl\RoomService;
use App\Http\Service\ServiceInterface\RoomServiceInterface;
use App\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jsonString = file_get_contents(base_path('public/city.json'));
        $data = json_decode($jsonString, true);
//        dd($data[0]['name']);
        return view('adminSite.createRoom',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(createRoom $request)
    {
        $this->roomService->store($request);


        return redirect()->route('room.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Room $room
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $room = $this->roomService->findById($id);
        return view('listSite.roomDetail', compact('room'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Room $room
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $room = $this->roomService->findById($id);
        return view('rooms.edit', compact('room'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Room $room
     * @return \Illuminate\Http\Response
     */
    public function update(createRoom $request, $id)
    {
        $this->roomService->update($request, $id);
        return redirect()->route('room.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Room $room
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->roomService->destroy($id);
        return redirect()->route('room.index');
    }
}
