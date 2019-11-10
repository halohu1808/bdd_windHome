<?php

namespace App\Http\Controllers;

use App\City;
use App\Http\Requests\BookkingRequest;
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
        $roomsSort = $this->roomService->getAll()->sortByDesc('created_at');
        return view('listSite.listPage', compact('roomsSort'));
    }

    public function findByCity(Request $request, Room $room)
    {
        $city = City::where('name', 'LIKE', '%' . $request->city . '%')->get();
        if (count($city) == 0) {
            Session::flash('unknowCity', 'Không tìm thấy kết quả phù hợp cho dữ liệu '. "'$request->city'" );
            return redirect()->route('room.list');
        }

        $room = $room->newQuery();
        $room->where('cityId', $city[0]->id);
        if ($request->minPrice != '') {
            $room->where('pricePerMonth', '>=', $request->minPrice);
        }
        if ($request->maxPrice != '') {
            $room->where('pricePerMonth', '<=', $request->maxPrice);
        }
        if ($request->guest != '') {
            $room->where('guest', '>=', $request->guest);
        }
        if ($request->area != '') {
            $room->where('area', '>=', $request->area);
        }

        $roomsSort = $room->get();
        if (count($roomsSort) == 0) {
            Session::flash('unknowCity', 'Không tìm thấy kết quả phù hợp cho dữ liệu '."'$request->city'" );
            return redirect()->route('room.list');
        }

        return view('listSite.listPage', compact('roomsSort'));
    }

    public function index()
    {
        $rooms = $this->roomService->getAll();


        return view('adminSite.adminSite', compact('rooms'));
    }

    public function create()
    {
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

        $room->linkmap = $request->linkmap;

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

    public
    function show($id)
    {
        $room = $this->roomService->findById($id);
        $images = $this->imageService->getAllImageByRoomId($id);
        return view('listSite.roomDetail', compact('room', 'images'));
    }

    public
    function edit($id)
    {
        $room = $this->roomService->findById($id);
        $cities = City::all();
        return view('rooms.edit', compact('room', 'cities'));
    }

    public
    function update(createRoom $request, $id)
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

    public
    function destroy($id)
    {
        Session::flash('delete', 'Đã tồn tại dữ liệu không được phép xóa');
        return redirect()->route('room.index');
    }

    public
    function managerUser()
    {
        return view('users.managerUser');
    }

    public
    function booking(BookkingRequest $request)
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

    public function autocomplete(Request $request)
    {
        dd($request);
        $data = User::select("name as name")->where("name", "LIKE", "%{$request->input('query')}%")->get();
        return response()->json($data);
    }

    public function searchAdvance()
    {
        return view('layout.search');
    }

}
