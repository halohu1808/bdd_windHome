<?php

namespace App\Http\Controllers;

use App\Http\Service\Impl\RoomService;
use App\Http\Service\ServiceInterface\ImageServiceInterface;
use App\Http\Service\ServiceInterface\RoomServiceInterface;
use App\Image;
use App\Room;
use Illuminate\Http\Request;

class
RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $roomService;
    protected $imageService;

    public function __construct(RoomServiceInterface $roomService, ImageServiceInterface $imageService)
    {
        $this->roomService = $roomService;
        $this->imageService = $imageService;
    }

    public function list()
    {
        $rooms = $this->roomService->getAll()->sortByDesc('created_at');  // <- Sort theo phòng mới tạo
        return view('listSite.listPage', compact('rooms'));
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
        return view('adminSite.createRoom');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $room = new Room();
        $room->name = $request->name;
        $room->address = $request->address;
        $room->city = $request->city;
        $room->country = $request->country;
        $room->pricePerMonth = $request->pricePerMonth;
        $room->minRentTime = $request->minRentTime;
        $room->bathRoom = $request->bathRoom;
        $room->area = $request->area;
        $room->guest = $request->guest;
        $room->parking = $request->parking;
        $room->wifi = $request->wifi;
        $room->cooking = $request->cooking;
        $room->airCondition = $request->airCondition;
        $room->status = $request->status;
        $room->lat = $request->lat;
        $room->lng = $request->lng;
        $room->save();

        if ($files = $request->file('images')) {
            foreach ($files as $file) {
                $name = $file->getClientOriginalName();
                $fileName = str_random(4) . "_" . $name;
                $file->move('img', $fileName);

                $image = new Image();
                $image->roomId = $room->id;
                $image->images = $fileName;
                $image->save();
            }
        }

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
    public function update(Request $request, $id)
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
