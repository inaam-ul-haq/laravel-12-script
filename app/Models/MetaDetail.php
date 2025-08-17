<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MetaDetail extends Model
{
    use HasFactory, HasUuids;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'meta_title',
        'meta_description',
        'meta_keywords',
        'focus_keyword',
        'og_title',
        'og_description',
        'og_type',
        'og_image',
        'twitter_title',
        'twitter_description',
        'twitter_card',
        'twitter_image',
        'canonical_url',
        'noindex',
        'nofollow',
        'status',
        'metadetail_id',
        'metadetail_type'
    ];

    /**
     * Attribute casting
     */
    protected $casts = [
        'noindex' => 'boolean',
        'nofollow' => 'boolean',
        'status' => 'string',
    ];

    /**
     * Polymorphic relation
     */
    public function metadetail()
    {
        return $this->morphTo();
    }
}
