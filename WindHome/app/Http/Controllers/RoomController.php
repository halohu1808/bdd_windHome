<?php

namespace App\Http\Controllers;


use App\Http\Service\Impl\RoomService;
use App\Http\Service\ServiceInterface\ImageServiceInterface;

use App\Http\Requests\createRoom;
use App\Http\Service\ServiceInterface\ContractServiceInterface;

use App\Http\Service\ServiceInterface\RoomServiceInterface;
use App\Image;
use App\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class
RoomController extends Controller
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

    public function create()
    {
        $jsonString = file_get_contents(base_path('public/city.json'));
        $data = json_decode($jsonString, true);
//        dd($data[0]['name']);
        return view('adminSite.createRoom', compact('data'));
    }

    public function store(createRoom $request)
    {
        $room = new Room();
        $room->name = $request->name;
        $room->address = $request->address;
        $room->cityId = $request->cityId;
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
//        $room->status = $request->status;
        $room->lat = $request->lat;
        $room->lng = $request->lng;
        $room->save();

        if ($files = $request->file('images')) {
            foreach ($files as $file) {
                $name = $file->getClientOriginalName();
                $fileName = str_random(4) . "_" . $name;
                $file->move('storage/img/home/', $fileName);

                $image = new Image();
                $image->roomId = $room->id;
                $image->images = $fileName;
                $image->save();
            }
        }

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
//        $this->imageService->destroy($id);
        $this->roomService->destroy($id);
        return redirect()->route('room.index');
    }

    public function managerUser()
    {
        return view('users.managerUser');
    }

    //Hai-code
    public function booking(Request $request)
    {
        $userId = Auth::user()->id;
        $room = $this->roomService->findById($request->roomId);
        $this->roomService->booking($request->roomId);
        $room = $this->roomService->findById($request->roomId);
        $this->contractService->booking($request, $room, $userId);

        $room = $this->roomService->findById($request->roomId);
        return view('listSite.roomDetail', compact('room'));
    }


}
