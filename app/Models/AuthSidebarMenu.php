<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuthSidebarMenu extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'auth_sidebar_menus';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['parent_id', 'name', 'icon', 'route', 'sort_order', 'feature_key', 'status', 'route_param'];

    public function parent()
    {
        return $this->belongsTo(AuthSidebarMenu::class, 'parent_id');
    }

    public function getParentNameAttribute()
    {
        return $this->parent ? $this->parent->name : "Main Feature";
    }

    public function children()
    {
        return $this->hasMany(AuthSidebarMenu::class, 'parent_id');
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'auth_sidebar_menu_permissions');
    }
}
