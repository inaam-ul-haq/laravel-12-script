<?php

namespace App\Providers;

use App\Constants\Constants;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Illuminate\Support\Facades\Log;
use App\Helper\Helpers;
use App\Interface\UserInterface;
use App\Repositories\UserRepository;
use App\Services\SettingService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(UserInterface::class, UserRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(SettingService $settingsService): void
    {
        try {
            if (!Helpers::dbConnectionStatus()) {
                Log::error('Database connection failed.');
                abort(500, 'Database connection failed.');
            }

            $this->forceSchemeHttps();

            Gate::before(function ($user, $ability) {
                return $user->hasRole(Constants::SUPERADMIN, 'web') ? true : null;
            });

            $this->registerBladeComponents();

            Route::middleware(['web', 'auth', 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath'])
                ->prefix(LaravelLocalization::setLocale() . '/my-account')
                ->group(base_path('routes/panel.php'));

            $setting = $settingsService->getSettings();
            $settingsService->applySettings();

            $this->setLocale($setting->default_language ?? config('app.locale'));

            View::share('setting', $setting);
        } catch (\Exception $e) {
            Log::error('Error in AppServiceProvider: ' . $e->getMessage());
            abort(500, 'Application boot failed.');
        }
    }

    private function forceSchemeHttps(): void
    {
        if ($this->app->environment('production')) {
            \URL::forceScheme('https');
        }
    }

    private function setLocale($lang): void
    {
        app()->setLocale($lang);
    }

    private function registerBladeComponents(): void
    {
        Blade::component('auth.pages.users.profile.layout', 'my-profile');
        Blade::component('auth.pages.settings.layout', 'settings');
    }
}
