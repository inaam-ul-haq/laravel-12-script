<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        app()['cache']->forget('spatie.permission.cache');

        // Admin — full access
        $admin = Role::create([
            'name' => 'admin',
            'title' => 'Admin',
            'color' => '#FF6B6B'
        ]);
        $permissions = Permission::all();
        $admin->availablePermissions()->sync($permissions);
        $admin->syncPermissions($permissions);

        Role::create([
            'name' => 'user',
            'title' => 'User',
            'color' => '#4ECDC4'
        ]);
    }
}
