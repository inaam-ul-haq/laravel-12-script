<?php

namespace App\Models;

use App\Relationships\FileRelationship;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory, HasUuids, FileRelationship;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'url',
        'email',
        'google_analytics_active',
        'google_analytics_code',
        'default_country',
        'default_language',
        'languages',
        'installed_languages',
        'default_currency',
        'tax_rate',
        'stripe_active',
        'stripe_key',
        'stripe_secret',
        'stripe_base_url',
        'bank_transfer_active',
        'bank_transfer_instructions',
        'bank_transfer_informations',
        'smtp_host',
        'smtp_port',
        'smtp_username',
        'smtp_password',
        'smtp_email',
        'smtp_sender_name',
        'smtp_encryption',
        'facebook_active',
        'facebook_api_key',
        'facebook_api_secret',
        'facebook_redirect_url',
        'github_active',
        'github_api_key',
        'github_api_secret',
        'github_redirect_url',
        'google_active',
        'google_api_key',
        'google_api_secret',
        'google_redirect_url',
        'twitter_active',
        'twitter_api_key',
        'twitter_api_secret',
        'twitter_redirect_url',
        'registration',
        'on_boarding',
        'status'
    ];

    public function getLanguagesAttribute($value)
    {
        return array_map('trim', explode(',', $value));
    }

    public function getInstalledLanguagesAttribute($value)
    {
        return array_map('trim', explode(',', $value));
    }

    public function favicon()
    {
        return $this->fileUrl('favicon');
    }

    public function logo()
    {
        return $this->fileUrl('logo');
    }
}
