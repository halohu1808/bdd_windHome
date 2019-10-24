<?php

namespace App\Http\Controllers;
use App\Http\Service\ServiceInterface\UserServiceInterface;
use Illuminate\Http\Request;

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
        return view('usersSeeder.detail', compact('user'));
    }

    public function edit($id)
    {
        $user = $this->userService->findById($id);
        return view('usersSeeder.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $this->userService->update($request, $id);
        $user=$this->userService->findById($id);
        return view('usersSeeder.detail',compact('user'));
    }

}
