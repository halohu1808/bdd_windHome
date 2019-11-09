<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersRequest;
use App\Http\Service\ServiceInterface\ContractServiceInterface;
use App\Http\Requests\UserDetailRequest;
use App\Http\Requests\UserPasswordRequest;
use App\Http\Service\ServiceInterface\UserServiceInterface;
use App\Notifications\UserFeedback;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class UserController extends Controller
{
    protected $userService;
    protected $contractService;

    public function __construct(UserServiceInterface $userService, ContractServiceInterface $contractService)
    {
        $this->userService = $userService;
        $this->contractService = $contractService;

    }

    public function index()
    {
        $user = $this->userService->getAll();
        return view('user.index', compact('user'));
    }

    public function store(Request $request)
    {
        $this->userService->store($request);
        return redirect()->route('user.index');
    }

    public function show($id)
    {
        $user = $this->userService->findById($id);
        return view('users.detail', compact('user'));
    }

    public function edit($id)
    {
        $user = $this->userService->findById($id);
        if($user->name !== $user->password) {
            return view('users.edit', compact('user'));
        }
        else{
            Session::flash('facebook', 'Bạn không được thay đổi thông tin khi đăng nhập bằng Facebook');
            return view('users.detail', compact('user'));
        }
    }

    public function changePassword($id)
    {
        $user = $this->userService->findById($id);
        if($user->name !== $user->password){
            return view('users.changePassword', compact('user'));
        }
        else{
            Session::flash('facebook', 'Bạn không được thay đổi mật khẩu khi đăng nhập bằng Facebook');
            return view('users.detail', compact('user'));
        }

    }

    public function update(UserDetailRequest $request, $id)
    {
        $this->userService->update($request, $id);
        $user = $this->userService->findById($id);
        return view('users.detail', compact('user'));
    }

    public function updatePassword(UserPasswordRequest $request, $id)
    {
        $this->userService->updatePassword($request, $id);
        $user = $this->userService->findById($id);
        return view('users.detail', compact('user'));
    }

    public function feedback(Request $request, $id)
    {
        $feedback = new \App\Feedback();
        $feedback->content = $request->contentt;
        $feedback->contract_id = $id;
        $feedback->save();

        $contract = $this->contractService->findById($id);
        $admin = User::findorfail(1);
        $admin->notify(new UserFeedback($contract));

        Session::flash('feedback', 'Bạn gửi phản hồi thành công');
        return redirect()->route('userRoute.contractRun');

    }

    public function resetPassword(Request $request)
    {
        return $this->userService->findByEmail($request->email);
    }

}
