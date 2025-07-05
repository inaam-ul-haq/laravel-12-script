<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\SocialLoginController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Inaam\Installer\Middleware\ApplicationStatus;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

// Route::middleware(ApplicationStatus::class)->group(function () {
// Route::get('/', function () {
//     return view('welcome');
// })->name('welcome');
// });

Route::get('/clear', function () {
    Artisan::call('config:cache');
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');

    Artisan::call('migrate:fresh --seed');
    return "Cleared";
});

Auth::routes(
    [
        'verify' => true,
        'login' => false,
        'register' => false,
        'logout' => false
    ]
);

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [
            'localeSessionRedirect',
            'localizationRedirect',
            'localeViewPath',
        ],
    ],
    function () {
        Route::controller(FrontendController::class)->group(function () {
            Route::get('/', 'welcome')->name('welcome');
        });

        Route::prefix('/account/')->middleware('CheckRegister')->group(function () {
            Route::controller(LoginController::class)->group(function () {
                Route::get('signin', 'showLoginForm')->name('login');
                Route::post('signin', 'login');
            });

            Route::controller(RegisterController::class)->group(function () {
                Route::get('signup', 'showRegistrationForm')->name('register');
                Route::post('signup', 'register');
            });

            Route::get('verify', function () {
                return view('auth.verify');
            })->name('verify_email')->middleware('CheckVerifiedAccount');

            Route::get('auth/{provider}', [SocialLoginController::class, 'redirectToProvider'])->name('social.redirect');
            Route::get('auth/{provider}/callback', [SocialLoginController::class, 'handleProviderCallback'])->name('social.callback');
        });
    }
);
