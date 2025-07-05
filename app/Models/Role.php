<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Models\Role as SpatieRole;

class Role extends SpatieRole
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['name', 'title', 'guard_name', 'color'];

    public function availablePermissions()
    {
        return $this->belongsToMany(Permission::class, 'available_permissions', 'role_id', 'permission_id')
            ->withTimestamps();
    }

    public function getRoleTitleAttribute()
    {
        return '<span style="background-color: ' . $this->color . '; padding: 4px; border-radius: 4px;">'
            . ucfirst($this->title) .
            '</span>';
    }
}
