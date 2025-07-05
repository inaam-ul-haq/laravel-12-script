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
    }
}
