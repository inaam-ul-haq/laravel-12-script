<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory, HasUuids;

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

    /**
     * Get the author (user) that owns the post.
     */
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}
