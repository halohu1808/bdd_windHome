<?php

namespace App\Http\Controllers;

use App\Contract;
use App\Http\Service\ServiceInterface\ContractServiceInterface;
use App\Http\Service\ServiceInterface\RoomServiceInterface;
use Illuminate\Http\Request;

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

    }


    public function create()
    {
        return view('contracts.createContract');
    }

    public function store(Request $request)
    {
        $this->contractService->store($request);
//        return redirect()->route('room.index');

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Contract $contract
     * @return \Illuminate\Http\Response
     */
    public function show(Contract $contract)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Contract $contract
     * @return \Illuminate\Http\Response
     */
    public function run($id)
    {
        $room = $this->roomService->findById($id);
        $contract = $this->contractService->findByRoomId($id);
        return view('contracts.editContract', compact('room', 'contract'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Contract $contract
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contract $contract)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Contract $contract
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contract $contract)
    {
        //
    }
}
