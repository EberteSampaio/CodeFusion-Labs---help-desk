<?php

namespace App\Providers;

use App\Interfaces\Auth\AuthServiceInterface;
use App\Interfaces\User\UserRepositoryInterface;
use App\Repository\User\UserRepository;
use App\Services\Auth\AuthService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(UserRepositoryInterface::class,UserRepository::class);
        $this->app->bind(AuthServiceInterface::class,AuthService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
