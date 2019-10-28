<?php

namespace App\Http\Controllers;

use App\Http\Service\ServiceInterface\ContractServiceInterface;
use App\Http\Service\ServiceInterface\ImageServiceInterface;
use App\Http\Service\ServiceInterface\RoomServiceInterface;
use Illuminate\Http\Request;

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

        $this->roomService->cancelBookingRequest($roomId);
        $this->contractService->deleteContract($contractId);
        return redirect()->route('userRoute.allContract');
    }

    public function cancelRoom($roomId, $contractId)
    {
        $this->roomService->cancelRoom($roomId);
        $this->contractService->cancelRoom($contractId);
        return redirect()->route('userRoute.allContract');

    }


}
