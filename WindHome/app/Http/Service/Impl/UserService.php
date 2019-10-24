<?php


namespace App\Http\Service\Impl;


use App\Http\Repository\Contract\UserRepositoryInterface;
use App\Http\Service\ServiceInterface\UserServiceInterface;
use Illuminate\Support\Facades\Hash;

class UserService implements UserServiceInterface
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getAll()
    {
        return $this->userRepository->getAll();
    }

    public function store($request)
    {
        $data = $request->all();
        $this->userRepository->store($data);
    }

    public function update($request, $id)
    {
        $user = $this->userRepository->findById($id);
        $data = $request->all();
        $this->userRepository->update($user, $data);
    }

    public function findById($id)
    {
        return $this->userRepository->findById($id);
    }

    public function destroy($id)
    {
        $user = $this->userRepository->findById($id);
        $this->userRepository->destroy($user);
    }
}
