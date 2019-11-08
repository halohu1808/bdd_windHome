<?php

namespace App\Http\Controllers;

use App\Contract;
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

    public function detail($id)
    {

        foreach (Auth::user()->notifications as $notification) {
            $notification->markAsRead();
        }

        $images = $this->imageService->getAllImageByRoomId($id);
        $room = $this->roomService->findById($id);

        return view('adminSite.roomDetail', compact('room', 'images'));
    }

    public function cancelCancelRoom($id, $key = null)
    {
        if (($key != '')) {
            Auth::user()->notifications[$key]->markAsRead();
            Auth::user()->notifications[$key - 1]->markAsRead();
        }

        $images = $this->imageService->getAllImageByRoomId($id);
        $room = $this->roomService->findById($id);
        return view('adminSite.roomDetail', compact('room', 'images'));


    }

    public function income()
    {
        $contracts = Contract::where('statusId', '5')->get();
        return view('adminSite.adminIncome', compact('contracts'));
    }


}
