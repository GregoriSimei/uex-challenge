<?php

namespace App\Providers;

use App\Repositories\UserRepository;
use App\Repositories\UserRepositoryInterface;
use App\Services\User\CreateUserService\CreateUserService;
use App\Services\User\CreateUserService\CreateUserServiceInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // repositories
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);

        // services
        $this->app->bind(CreateUserServiceInterface::class, CreateUserService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
