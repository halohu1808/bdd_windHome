<?php

namespace App\Http\Controllers;

use App\Http\Service\ServiceInterface\RoomServiceInterface;
use Illuminate\Http\Request;

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

    public function editStatus(Request $request, $id)
    {
        $room = $this->roomService->findById($id);
        $room->status = $request->status;
        $this->roomService->save($room);
        return view('adminSite.roomDetail', compact('room'));
    }

}
