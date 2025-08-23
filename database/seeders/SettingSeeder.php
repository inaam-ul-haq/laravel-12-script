<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    # Looking to send emails in production? Check out our Email API/SMTP product!

    public function run(): void
    {
        $setting = new Setting();

        $setting->name = config('services.app.name');
        $setting->url = config('services.app.url');
        $setting->email = config('services.app.email');

        $setting->smtp_host = config('services.smtp.host');
        $setting->smtp_port = config('services.smtp.port');
        $setting->smtp_username = config('services.smtp.username');
        $setting->smtp_password = config('services.smtp.password');
        $setting->smtp_email = config('services.app.email');
        $setting->smtp_sender_name = config('services.app.name');
        $setting->smtp_encryption = 'tls';

        $setting->save();
        $setting->file()->create(['name' => 'logo.png', 'path' => 'settings/logo.png', 'type' => 'logo']);

        $setting->meta_detail()->create([
            'meta_title'        => config('services.app.name'),
            'meta_description'  => 'Default meta description for the application.',
            'meta_keywords'     => 'laravel, settings, seo',
            'focus_keyword'     => 'laravel seo',
            'og_title'          => config('services.app.name'),
            'og_description'    => 'Default OpenGraph description',
            'og_type'           => 'website',
            'og_image'          => 'settings/logo.png',
            'twitter_title'     => config('services.app.name'),
            'twitter_description' => 'Default Twitter description',
            'twitter_card'      => 'summary_large_image',
            'twitter_image'     => 'settings/logo.png',
            'canonical_url'     => null,
            'noindex'           => 0,
            'nofollow'          => 0,
            'status'            => 1,
        ]);
    }
}
