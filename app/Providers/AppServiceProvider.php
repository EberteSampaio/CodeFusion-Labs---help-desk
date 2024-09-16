<?php

namespace App\Providers;

use App\Interfaces\Auth\AuthServiceInterface;
use App\Interfaces\Category\CategoryRepositoryInterface;
use App\Interfaces\Category\CategoryServiceInterface;
use App\Interfaces\User\UserRepositoryInterface;
use App\Repository\Category\CategoryRepository;
use App\Repository\User\UserRepository;
use App\Services\Auth\AuthService;
use App\Services\Category\CategoryService;
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
        $this->app->bind(CategoryServiceInterface::class,CategoryService::class);
        $this->app->bind(CategoryRepositoryInterface::class,CategoryRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
