<?php

namespace App\Models;

use App\Relationships\FileRelationship;
use App\Relationships\MetaDetailRelationship;
use App\Relationships\SchemaRelationship;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory, HasUuids, FileRelationship, MetaDetailRelationship, SchemaRelationship;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'slug',
        'short_summary',
        'content',
        'author_id',
        'status',
        'published_at',
        'is_featured',
        'view_count',
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    /**
     * Get the author (user) that owns the post.
     */
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function getShortDescriptionAttribute(): string
    {
        if ($this->attributes['short_summary'] == null) {
            return __('language.no_short_description');
        }

        return Str::limit($this->attributes['short_summary'], 100);
    }

    public function getPublishedAttribute(): string
    {
        return $this->published_at
            ? $this->published_at->format('M d, Y')
            : __('language.not_published');
    }
}
