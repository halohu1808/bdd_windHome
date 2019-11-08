<?php

namespace App\Http\Controllers;

use App\Contract;
use App\Http\Requests\ContractRequest;
use App\Http\Requests\ExtensionRequest;
use App\Http\Service\ServiceInterface\ContractServiceInterface;
use App\Http\Service\ServiceInterface\RoomServiceInterface;
use App\Notifications\AdminCancelEnd;
use App\Notifications\AdminContractCancel;
use App\Notifications\AdminContractEnd;
use App\Notifications\AdminContractEndContract;
use App\Notifications\AdminContractStore;
use App\Notifications\AdminExtensionContract;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ContractController extends Controller
{
    protected $contractService;
    protected $roomService;

    public function __construct(ContractServiceInterface $contractService, RoomServiceInterface $roomService)
    {
        $this->contractService = $contractService;
        $this->roomService = $roomService;
    }

    public function index()
    {
        $contracts = Contract::all();
        return view('contracts.listContract', compact('contracts'));
    }

    public function create()
    {
        return view('contracts.createContract');
    }

    public function run($id)
    {
//        $id = roomId
        $room = $this->roomService->findById($id);
        $contract = $this->contractService->findByRoomId($id);
        return view('contracts.editContract', compact('room', 'contract'));
    }

    public function store(ContractRequest $request, $id)
    {
        $contract = $this->contractService->findById($id);
        $this->contractService->store($request, $id);
        $roomId = $contract->room->id;
        $this->roomService->changeStatusWhenCreateContract($roomId);

        $room = $this->roomService->findById($roomId);
        $userId = $contract->userId;


        $user = User::findorfail($userId);
        $user->notify(new AdminContractStore($room, $contract));

        Session::flash('createContract', 'Tạo hợp đồng thành công');
        return redirect()->route('room.index');
    }

    public function cancel($id)
    {
        $room = $this->roomService->findById($id);
        $userId = $this->contractService->cancel($id);
        $this->roomService->changeStatusWhenNotOk($id);

        $user = User::findorfail($userId);
        $user->notify(new AdminContractCancel($room));
        Session::flash('contractCancel', 'Bạn vừa hủy tạo hợp đồng');
        return redirect()->route('room.index');
    }

    public function endContract($id)
    {

        $this->roomService->endContract($id);
        $contract = $this->contractService->endContract($id);
        $room = $this->roomService->findById($id);

        $userId = $contract->userId;
        $user = User::findorfail($userId);

        $user->notify(new AdminContractEndContract($room, $contract));

        Session::flash('endContracts', 'Bạn vừa hủy hợp đồng');
        return redirect()->route('admin.index');
    }

    public function edit()
    {
        return view('contracts.editContract');
    }

    public function underContrucction($id)
    {
        $this->roomService->underContruction($id);
        Session::flash('underContract', 'Bạn vừa chuyển phòng sang sữa chữa');
        return redirect()->route('admin.index');
    }

    public function hasRoom($id)
    {
        $this->roomService->hasRoom($id);
        Session::flash('hasRoom', 'Phòng vừa chuyển từ sữa chữa sang còn phòng');
        return redirect()->route('admin.index');
    }


    //Hai code
    public function end($id)
    {
        $contract = $this->contractService->end($id);
        $this->roomService->end($id);
        $room = $this->roomService->findById($id);

        $userId = $contract->userId;
        $user = User::findorfail($userId);
        $user->notify(new AdminContractEnd($room, $contract));


        Session::flash('end', 'Bạn vừa hủy hợp đồng cho khách');
        return redirect()->route('admin.index');
    }

    public function cancelEnd($id)
    {

        $this->roomService->cancelEnd($id);
        $contract = $this->contractService->cancelEnd($id);


        Session::flash('contractCancelEnd', 'Bạn vừa hủy yêu cầu hủy hợp đồng');
        return redirect()->route('userRoute.allContract');
    }

    public function cancelEndByAdmin($id)
    {
        $this->roomService->cancelEnd($id);
        $contract = $this->contractService->cancelEnd($id);

        $room = $this->roomService->findById($id);

        $userId = $contract->userId;
        $user = User::findorfail($userId);

        $user->notify(new AdminCancelEnd($room, $contract));

        Session::flash('cancelEndByAdmin', 'Bạn vừa hủy yêu cầu hủy hợp đồng');
        return redirect()->route('admin.index');
    }

    public function extension($id)
    {
        $room = $this->roomService->findById($id);
        $contract = $this->contractService->extensionContract($id);

        $rentime = $contract[0]->rentTime;
        $startTime = strtotime($contract[0]->startTime);
        $timeFormat = date('Y-m-d', $startTime);
        $carbonStartTime = Carbon::create($timeFormat);
        $carbonNow = Carbon::now();
        $endTime1 = $carbonStartTime->addMonth($rentime);
        $timeLeft = $endTime1->diffInDays($carbonNow);
        $endTime = $endTime1->toDateString();
        $userId = $contract[0]->userId;
        $user = User::findorfail($userId);


        $user->notify(new AdminExtensionContract($room, $contract[0]));


        return view('contracts.extensionContract', compact('contract', 'room', 'timeLeft'));
    }

    public function extensionUpdate(ExtensionRequest $request, $id)
    {
        $this->contractService->extensionUpdate($request, $id);
        Session::flash('extensionUpdate', 'Bạn vừa gia hạn hợp đồng thành công');
        return redirect()->route('admin.index');

    }

    public function feedback(Request $request, $contractId)
    {
        $contract = $this->contractService->findById($contractId);

    }


}
