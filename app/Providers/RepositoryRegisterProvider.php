<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interface\UserInterface;
use App\Interfaces\AuthSidebarMenuInterface;
use App\Repositories\AuthSidebarMenuRepository;
use App\Repositories\UserRepository;

class RepositoryRegisterProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(UserInterface::class, UserRepository::class);
        $this->app->bind(AuthSidebarMenuInterface::class, AuthSidebarMenuRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void {}
}
