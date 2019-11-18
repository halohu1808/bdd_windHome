<?php

namespace App\Providers;

use App\Http\Repository\Contract\CommentRepositoryInterface;
use App\Http\Repository\Contract\ContractRepositoryInterface;
use App\Http\Repository\Contract\ImageRepositoryInterface;
use App\Http\Repository\Contract\RepositoryInterface;
use App\Http\Repository\Contract\RoomRepositoryInterface;
use App\Http\Repository\Contract\UserRepositoryInterface;
use App\Http\Repository\Eloquent\CommentRepositoryEloquent;
use App\Http\Repository\Eloquent\ContractRepositoryEloquent;
use App\Http\Repository\Eloquent\ImageRepositoryEloquent;
use App\Http\Repository\Eloquent\RepositoryEloquent;
use App\Http\Repository\Eloquent\RoomRepositoryEloquent;
use App\Http\Repository\Eloquent\UserRepositoryEloquent;
use App\Http\Service\Impl\CommentService;
use App\Http\Service\Impl\ContractService;
use App\Http\Service\Impl\ImageService;
use App\Http\Service\Impl\RoomService;
use App\Http\Service\Impl\UserService;
use App\Http\Service\ServiceInterface\CommentServiceInterface;
use App\Http\Service\ServiceInterface\ContractServiceInterface;
use App\Http\Service\ServiceInterface\ImageServiceInterface;
use App\Http\Service\ServiceInterface\RoomServiceInterface;
use App\Http\Service\ServiceInterface\UserServiceInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(CommentServiceInterface::class,
            CommentService::class);
        $this->app->singleton(ContractServiceInterface::class,
            ContractService::class);
        $this->app->singleton(ImageServiceInterface::class,
            ImageService::class);
        $this->app->singleton(RoomServiceInterface::class,
            RoomService::class);
        $this->app->singleton(CommentRepositoryInterface::class,
            CommentRepositoryEloquent::class);
        $this->app->singleton(ContractRepositoryInterface::class,
            ContractRepositoryEloquent::class);
        $this->app->singleton(ImageRepositoryInterface::class,
            ImageRepositoryEloquent::class);
        $this->app->singleton(RepositoryInterface::class,
            RepositoryEloquent::class);
        $this->app->singleton(RoomRepositoryInterface::class,
            RoomRepositoryEloquent::class);
        $this->app->singleton(UserRepositoryInterface::class,
            UserRepositoryEloquent::class);
        $this->app->singleton(UserServiceInterface::class,
            UserService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
