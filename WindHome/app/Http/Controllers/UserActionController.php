<?php

namespace App\Http\Controllers;

use App\Http\Service\ServiceInterface\ContractServiceInterface;
use App\Http\Service\ServiceInterface\ImageServiceInterface;
use App\Http\Service\ServiceInterface\RoomServiceInterface;
use App\Notifications\Booking;
use App\Notifications\UserCancelRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserActionController extends Controller
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

    public function cancelBookingRequest($roomId, $contractId)
    {
        $contract = $this->contractService->findById($contractId);
        $admin = User::findorfail(1);
        $user = Auth::user();
        $admin->notify(new UserCancelRequest($user, $contract));
        $this->roomService->cancelBookingRequest($roomId);
        $this->contractService->deleteContract($contractId);

        return redirect()->route('userRoute.allContract');
    }

    public function cancelRoom($roomId, $contractId)
    {

        $this->roomService->cancelRoom($roomId);
        $this->contractService->cancelRoom($contractId);
        $contract = $this->contractService->findById($contractId);
        $admin = User::findorfail(1);
        $user = Auth::user();
        $admin->notify(new UserCancelRequest($user, $contract));
        Session::flash('cancelRoom', 'Bạn vừa chọn hủy hợp đồng');
        return redirect()->route('userRoute.allContract');

    }


}
