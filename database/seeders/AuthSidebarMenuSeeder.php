<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuthSidebarMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Example data for seeding the auth_sidebar_menus table
        $menus = [
            [
                'parent_id' => null,
                'name' => 'Dashboard',
                'icon' => 'dashboard-icon',
                'route' => 'auth',
                'sort_order' => '1',
                'feature_key' => 'view_dashboard',
                'status' => '1',
            ],
            [
                'parent_id' => null,
                'name' => 'Settings',
                'icon' => 'settings-icon',
                'route' => 'settings.index',
                'sort_order' => '2',
                'feature_key' => 'manage_settings',
                'status' => '1',
            ],
        ];

        foreach ($menus as $menu) {
            \App\Models\AuthSidebarMenu::create($menu);
        }
    }
}
