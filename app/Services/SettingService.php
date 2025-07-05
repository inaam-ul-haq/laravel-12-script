<?php

namespace App\Services;

use App\Constants\CacheConstants;
use Illuminate\Support\Facades\Cache;
use App\Repositories\SettingRepository;

class SettingService
{
    protected $settingRepo;

    public function __construct(SettingRepository $settingRepo)
    {
        $this->settingRepo = $settingRepo;
    }

    public function getSettings()
    {
        return Cache::remember(CacheConstants::SITE_SETTINGS, 3600, function () {
            return $this->settingRepo->index();
        });
    }

    public function clearCache()
    {
        Cache::forget(CacheConstants::SITE_SETTINGS);
    }

    public function applySettings()
    {
        $setting = $this->getSettings();

        if (!$setting) {
            return;
        }

        config([
            'app.name' => $setting->name,
            'app.url' => $setting->url,
            'app.logo' => $setting->logo(),

            'mail.mailers.smtp.host' => $setting->smtp_host ?? env('MAIL_HOST'),
            'mail.mailers.smtp.port' => (int)($setting->smtp_port ?? env('MAIL_PORT')),
            'mail.mailers.smtp.username' => $setting->smtp_username ?? env('MAIL_USERNAME'),
            'mail.mailers.smtp.password' => $setting->smtp_password ?? env('MAIL_PASSWORD'),
            'mail.mailers.smtp.encryption' => $setting->smtp_encryption ?? env('MAIL_ENCRYPTION'),
            'mail.from.address' => $setting->smtp_email ?? env('MAIL_FROM_ADDRESS'),
            'mail.from.name' => $setting->smtp_sender_name ?? env('MAIL_FROM_NAME'),
        ]);
    }
}
