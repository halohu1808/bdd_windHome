<?php

namespace App\Http\Controllers;

use App\Http\Service\ServiceInterface\RoomServiceInterface;

class AdminController extends Controller
{
    protected $roomService;

    public function __construct(RoomServiceInterface $roomService)
    {
        $this->roomService = $roomService;
    }

    public function index($id)
    {
        $room = $this->roomService->findById($id);
        return view('adminSite.roomDetail', compact('room'));
    }

    public function editStatusOn($id)
    {
        $room = $this->roomService->findById($id);
        $room->status = "Còn Phòng";
        $this->roomService->save($room);
        return view('adminSite.roomDetail', compact('room'));
    }

    public function editStatusOff($id)
    {
        $room = $this->roomService->findById($id);
        $room->status = "Đã Cho Thuê";
        $this->roomService->save($room);
        return view('adminSite.roomDetail', compact('room'));
    }

}
