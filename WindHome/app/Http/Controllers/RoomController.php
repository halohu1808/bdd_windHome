<?php

namespace App\Http\Controllers;

use App\City;
use App\Http\Requests\BookkingRequest;
use App\Http\Service\Impl\RoomService;
use App\Http\Service\ServiceInterface\ImageServiceInterface;

use App\Http\Requests\createRoom;
use App\Http\Service\ServiceInterface\ContractServiceInterface;

use App\Http\Service\ServiceInterface\RoomServiceInterface;
use App\Image;
use App\Notifications\Booking;
use App\Room;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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
        $rooms = $this->roomService->getAll();
        $images = [];

        foreach ($rooms as $room) {
            $image = $this->imageService->getFirstImageByRoomId($room->id);
            array_push($images, $image);
        }
        $roomsSort = $this->roomService->getAll()->sortByDesc('created_at');// <- Sort theo phòng mới tạo
        return view('listSite.listPage', compact('roomsSort', 'images'));
    }

    public function index()
    {
        $rooms = $this->roomService->getAll();


        return view('adminSite.adminSite', compact('rooms'));
    }

    public function create()
    {
//        $jsonString = file_get_contents(base_path('public/city.json'));
//        $data = json_decode($jsonString, true);
//        dd($data[0]['name']);
        $cities = City::all();

        return view('adminSite.createRoom', compact('cities'));
    }

    public function store(createRoom $request)
    {
        $room = new Room();
        $room->name = $request->name;
        $room->address = $request->address;
        $room->cityId = $request->cityId;

        $room->pricePerMonth = $request->pricePerMonth;
        $room->minRentTime = $request->minRentTime;
        $room->bathRoom = $request->bathRoom;
        $room->area = $request->area;
        $room->guest = $request->guest;
        $room->parking = $request->parking;
        $room->wifi = $request->wifi;
        $room->cooking = $request->cooking;
        $room->airCondition = $request->airCondition;
        $room->electricFee = $request->electricFee;
        $room->waterFee = $request->waterFee;
        $room->trashFee = $request->trashFee;
        if ($thumbnail = $request->file('thumbnail')) {

            $name = $thumbnail->getClientOriginalName();
            $fileName = str_random(4) . "_" . $name;
            $thumbnail->move('storage/img/home/', $fileName);

            $room->thumbnail = $fileName;

        }

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
        Session::flash('create', "Tạo mới phòng thành công");

        return redirect()->route('room.index');
    }

    public function show($id)
    {
        $room = $this->roomService->findById($id);
        $images = $this->imageService->getAllImageByRoomId($id);
        $thumpImages = [];


        return view('listSite.roomDetail', compact('room', 'images'));
    }

    public function edit($id)
    {
        $room = $this->roomService->findById($id);
        $cities = City::all();
        return view('rooms.edit', compact('room', 'cities'));
    }

    public function update(createRoom $request, $id)
    {
        $room = $this->roomService->findById($id);
        $room->name = $request->name;
        $room->address = $request->address;
        $room->cityId = $request->cityId;

        $room->pricePerMonth = $request->pricePerMonth;
        $room->minRentTime = $request->minRentTime;
        $room->bathRoom = $request->bathRoom;
        $room->area = $request->area;
        $room->guest = $request->guest;
        $room->parking = $request->parking;
        $room->wifi = $request->wifi;
        $room->cooking = $request->cooking;
        $room->airCondition = $request->airCondition;
        $room->electricFee = $request->electricFee;
        $room->waterFee = $request->waterFee;
        $room->trashFee = $request->trashFee;
        if ($thumbnail = $request->file('thumbnail')) {

            $name = $thumbnail->getClientOriginalName();
            $fileName = str_random(4) . "_" . $name;
            $thumbnail->move('storage/img/home/', $fileName);


            $room->thumbnail = $fileName;
//            dd($room->thumbnail);

        }

        $this->roomService->save($room);

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

        Session::flash('update', 'cập nhật thành công');

        return redirect()->route('room.index');
    }

    public function destroy($id)
    {
//        $img = $this->imageService->destroyRoom($id);
        Session::flash('delete', 'Đã tồn tại dữ liệu không được phép xóa');

        return redirect()->route('room.index');
    }

    public function managerUser()
    {
        return view('users.managerUser');
    }

    //Hai-code
    public function booking(BookkingRequest $request)
    {
        $userId = Auth::user()->id;

//        $room = $this->roomService->findById($request->roomId);
        $room = $this->roomService->booking($request->roomId);
        $contract = $this->contractService->booking($request, $room, $userId);
        $images = $this->imageService->getAllImageByRoomId($request->roomId);

        $admin = User::findorfail(1);
        $user = Auth::user();
        $admin->notify(new Booking($user, $contract));
        Session::flash('booking', 'Bạn giữ phòng thành công');
        return view('listSite.roomDetail', compact('room', 'images'));
    }


}
