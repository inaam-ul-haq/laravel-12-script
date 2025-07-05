<?php

namespace App\Http\Controllers;

use App\Constants\Constants;
use App\Models\User;
use App\Repositories\SettingRepository;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;

class SocialLoginController extends Controller
{
    protected function getProviderConfig($provider)
    {
        $settingRepo = app(SettingRepository::class);
        $setting = $settingRepo->index();

        $isActive = $provider . '_active';
        $api = $provider . '_api_key';
        $secret = $provider . '_api_secret';
        $url = $provider . '_redirect_url';

        if ($setting->where($isActive, '1')->first()) {
            config([
                "services.$provider.client_id" => $setting->$api,
                "services.$provider.client_secret" => $setting->$secret,
                "services.$provider.redirect" => $setting->$url,
            ]);
        } else {
            abort(404);
        }
    }

    /**
     * Redirect the user to the provider's authentication page.
     *
     * @param string $provider
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider($provider)
    {
        $this->getProviderConfig($provider);
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from the provider.
     *
     * @param string $provider
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback($provider)
    {
        try {
            $this->getProviderConfig($provider);

            $socialUser = Socialite::driver($provider)->user();
            // dd($socialUser);

            if ($provider == 'google') {
                $user = User::firstOrCreate(
                    ['email' => $socialUser->getEmail()],
                    [
                        'username' => $socialUser->getName(),
                        'first_name' => $socialUser->user['given_name'],
                        'last_name' => $socialUser->user['family_name'],
                        'provider_id' => $socialUser->getId(),
                        'provider' => $provider,
                        'email_verified_at' => $socialUser->user['email_verified'] ?  now() : null,
                    ]
                );
            }

            if ($provider == 'github') {
                $user = User::firstOrCreate(
                    ['email' => $socialUser->getEmail()],
                    [
                        'username' => $socialUser->getNickname(),
                        'first_name' => $socialUser->getName(),
                        'about' => $socialUser->user['bio'],
                        'provider_id' => $socialUser->getId(),
                        'provider' => $provider,
                        'email_verified_at' => now(),
                    ]
                );
            }


            $user->file()->create([
                'name' => 'profile',
                'path' => $socialUser->getAvatar(),
                'type' => Constants::PROFILETYPE,
            ]);

            Auth::login($user, true);
            return redirect()->route('auth');
        } catch (\Exception $e) {
            dd($e->getMessage());
            return redirect()->route('login')->withErrors('Unable to login, try again later.');
        }
    }
}
