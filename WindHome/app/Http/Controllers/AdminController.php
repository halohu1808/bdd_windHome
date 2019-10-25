<?php

namespace App\Http\Controllers;

use App\Http\Service\ServiceInterface\ImageServiceInterface;
use App\Http\Service\ServiceInterface\RoomServiceInterface;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    protected $roomService;
    protected $imageService;

    public function __construct(RoomServiceInterface $roomService, ImageServiceInterface $imageService)
    {
        $this->roomService = $roomService;
        $this->imageService = $imageService;
    }

    public function index()
    {
        $rooms = $this->roomService->getAll();
        return view('adminSite.adminSite', compact('rooms'));
    }

    public function detail($id)
    {
        $images = $this->imageService->getAllImageByRoomId($id);
        $room = $this->roomService->findById($id);
        return view('adminSite.roomDetail', compact('room', 'images'));
    }


}
