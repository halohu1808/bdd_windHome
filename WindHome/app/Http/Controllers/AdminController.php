<?php

namespace App\Http\Controllers;

use App\Http\Service\ServiceInterface\ImageServiceInterface;
use App\Http\Service\ServiceInterface\RoomServiceInterface;
use App\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function detail($id, $key = null)
    {
        if (($key!='')) {
            Auth::user()->notifications[$key]->markAsRead();

            $noti = Notification::where ('id',Auth::user()->notifications[$key]->id )->get();
            $room_id = json_decode($noti[0]->data)->room_id;
            dd($room_id);
        }



        $images = $this->imageService->getAllImageByRoomId($id);
        $room = $this->roomService->findById($id);

        return view('adminSite.roomDetail', compact('room', 'images'));
    }


}
