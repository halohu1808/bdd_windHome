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

    public function index()
    {
        $rooms = $this->roomService->getAll();
        return view('adminSite.adminSite', compact('rooms'));
    }

    public function detail($id)
    {
        $room = $this->roomService->findById($id);
        return view('adminSite.roomDetail', compact('room'));
    }


}
