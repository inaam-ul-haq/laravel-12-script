<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuthSidebarMenu extends Model
{
    use HasFactory, HasUuids;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['parent_id', 'name', 'icon', 'route', 'sort_order', 'feature_key', 'status'];

    public function parent()
    {
        return $this->belongsTo(AuthSidebarMenu::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(AuthSidebarMenu::class, 'parent_id');
    }
}
