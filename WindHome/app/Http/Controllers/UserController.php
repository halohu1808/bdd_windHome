<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserDetailRequest;
use App\Http\Requests\UserPasswordRequest;
use App\Http\Service\ServiceInterface\UserServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class UserController extends Controller
{
    protected $userService;

    public function __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService;
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
        return view('users.edit', compact('user'));
    }

    public function changePassword($id)
    {
        $user = $this->userService->findById($id);
        return view('users.changePassword', compact('user'));
    }

    public function update(UserDetailRequest $request, $id)
    {
        $this->userService->update($request, $id);
        $user = $this->userService->findById($id);
        return view('users.detail', compact('user'));

    }

    public function updatePassword(UserPasswordRequest $request, $id)
    {
        $user = $this->userService->findById($id);
        if (Hash::check($request->passwordOld, $user->password)){
            $this->userService->updatePassword($request, $id);
            return view('users.detail', compact('user'));
        }
        else {
            Session::flash('message', 'Mật khẩu cũ không đúng');
            return view('users.changePassword', compact('user'));
        }

    }

}
