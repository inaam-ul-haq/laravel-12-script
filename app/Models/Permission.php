<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission as SpatiePermission;

class Permission extends SpatiePermission
{
    use HasFactory;

    protected $table = "permissions";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['name', 'guard_name'];

    public function linkedRoles()
    {
        return $this->belongsToMany(Role::class, 'available_permissions', 'permission_id', 'role_id')
            ->withTimestamps();
    }
}
