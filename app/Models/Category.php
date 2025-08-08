<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory, HasUuids;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'slug',
        'parent_id',
        'status',
    ];

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function getStatusLabelAttribute()
    {
        if ($this->attributes['status'] == 1) {
            return '<span style="background-color: #28a745; color: white; padding: 3px 8px; border-radius: 4px;">Active</span>';
        }

        return '<span style="background-color: #dc3545; color: white; padding: 3px 8px; border-radius: 4px;">Archived</span>';
    }
}
