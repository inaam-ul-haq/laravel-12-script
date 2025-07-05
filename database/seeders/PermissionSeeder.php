<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'all_user', 'title' => 'View all users', 'category' => 'Users']);
        Permission::create(['name' => 'add_user', 'title' => 'Add new user', 'category' => 'Users']);
        Permission::create(['name' => 'view_user', 'title' => 'View user details', 'category' => 'Users']);
        Permission::create(['name' => 'edit_user', 'title' => 'Edit user', 'category' => 'Users']);
        Permission::create(['name' => 'delete_user', 'title' => 'Delete user', 'category' => 'Users']);

        Permission::create(['name' => 'all_role', 'title' => 'All Roles', 'category' => 'Roles']);
        Permission::create(['name' => 'add_role', 'title' => 'Add Role', 'category' => 'Roles']);
        Permission::create(['name' => 'edit_role', 'title' => 'Edit Role', 'category' => 'Roles']);
        Permission::create(['name' => 'delete_role', 'title' => 'Delete Role', 'category' => 'Roles']);
        Permission::create(['name' => 'assign_permission', 'title' => 'Assign Permission', 'category' => 'Roles']);

        Permission::create(['name' => 'website_setting', 'title' => 'Website Setting', 'category' => 'Website Settings']);
    }
}
