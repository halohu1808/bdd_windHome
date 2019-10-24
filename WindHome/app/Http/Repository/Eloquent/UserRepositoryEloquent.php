<?php


namespace App\Http\Repository\Eloquent;


use App\Http\Repository\Contract\UserRepositoryInterface;
use App\User;

class UserRepositoryEloquent extends RepositoryEloquent implements UserRepositoryInterface
{

    public function getModel()
    {
        return User::class;
    }
}
