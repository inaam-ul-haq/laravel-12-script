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
        Permission::create(['name' => 'dashboard', 'title' => 'Dashboard', 'category' => 'Dashboard']);

        Permission::create(['name' => 'all_user', 'title' => 'View all users', 'category' => 'Users']);
        Permission::create(['name' => 'add_user', 'title' => 'Add new user', 'category' => 'Users']);
        Permission::create(['name' => 'view_user', 'title' => 'View user details', 'category' => 'Users']);
        Permission::create(['name' => 'edit_user', 'title' => 'Edit user', 'category' => 'Users']);
        Permission::create(['name' => 'delete_user', 'title' => 'Delete user', 'category' => 'Users']);

        Permission::create(['name' => 'all_sidebar_menu', 'title' => 'View all sidebar menues', 'category' => 'Sidebar Menu']);
        Permission::create(['name' => 'add_sidebar_menu', 'title' => 'Add new sidebar menu', 'category' => 'Sidebar Menu']);
        Permission::create(['name' => 'view_sidebar_menu', 'title' => 'View sidebar menu details', 'category' => 'Sidebar Menu']);
        Permission::create(['name' => 'edit_sidebar_menu', 'title' => 'Edit sidebar menu', 'category' => 'Sidebar Menu']);
        Permission::create(['name' => 'delete_sidebar_menu', 'title' => 'Delete sidebar menu', 'category' => 'Sidebar Menu']);

        Permission::create(['name' => 'all_role', 'title' => 'All Roles', 'category' => 'Roles']);
        Permission::create(['name' => 'add_role', 'title' => 'Add Role', 'category' => 'Roles']);
        Permission::create(['name' => 'edit_role', 'title' => 'Edit Role', 'category' => 'Roles']);
        Permission::create(['name' => 'delete_role', 'title' => 'Delete Role', 'category' => 'Roles']);
        Permission::create(['name' => 'assign_permission', 'title' => 'Assign Permission', 'category' => 'Roles']);

        Permission::create(['name' => 'website_setting', 'title' => 'Website Setting', 'category' => 'Website Settings']);
        Permission::create(['name' => 'site_configuration', 'title' => 'Site Configuration', 'category' => 'Configuration']);

        Permission::create(['name' => 'manage_settings', 'title' => 'Profile Setting', 'category' => 'Profile Settings']);
        Permission::create(['name' => 'manage_blog', 'title' => 'Manage Blog', 'category' => 'Blog']);
        Permission::create(['name' => 'manage_category', 'title' => 'Manage Category', 'category' => 'Blog']);

        Permission::create(['name' => 'communication', 'title' => 'Communication', 'category' => 'Communication']);
    }
}
