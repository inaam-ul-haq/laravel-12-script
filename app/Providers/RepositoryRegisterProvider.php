<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryRegisterProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(\App\Interface\UserInterface::class, \App\Repositories\UserRepository::class);
        $this->app->bind(\App\Interfaces\AuthSidebarMenuInterface::class, \App\Repositories\AuthSidebarMenuRepository::class);
        $this->app->bind(\App\Interfaces\CategoryInterface::class, \App\Repositories\CategoryRepository::class);
        $this->app->bind(\App\Interfaces\PostInterface::class, \App\Repositories\PostRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void {}
}
