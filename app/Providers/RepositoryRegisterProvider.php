<?php

namespace App\Providers;

use App\Models\Setting;
use App\Repositories\SettingRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryRegisterProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // $this->app->bind(SettingRepository::class, Setting::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void {}
}
