<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AuthSidebarMenu;
use App\Models\Role;
use App\Models\Permission;

class AuthSidebarMenuSeeder extends Seeder
{
    public function run(): void
    {
        $dashboard = AuthSidebarMenu::create([
            'name' => 'language.dashboard',
            'icon' => 'fa-home',
            'route' => 'auth',
            'sort_order' => 1,
            'feature_key' => 'dashboard',
            'status' => 1,
        ]);

        $this->attachPermission($dashboard);

        $staffManagement = AuthSidebarMenu::create([
            'name' => 'language.staff_management',
            'icon' => 'fa-file-invoice-dollar',
            'route' => null,
            'sort_order' => 2,
            'feature_key' => 'all_user',
            'status' => 1,
        ]);

        $this->attachPermission($staffManagement);

        $roles = Role::pluck('name', 'title');
        $sortOrder = 1;

        foreach ($roles as $roleKey => $roleName) {
            $child = $staffManagement->children()->create([
                'name' => $roleKey,
                'icon' => 'fa-angle-double-right',
                'route' => 'users.index',
                'route_param' => $roleName,
                'sort_order' => $sortOrder++,
                'feature_key' => 'all_user',
                'status' => 1,
            ]);

            $this->attachPermission($child);
        }

        $settings = AuthSidebarMenu::create([
            'name' => 'language.configuration',
            'icon' => 'fa-cogs',
            'route' => null,
            'sort_order' => 3,
            'feature_key' => 'website_setting',
            'status' => 1,
        ]);

        $this->attachPermission($settings);

        $settingsChildren = [
            [
                'name' => 'language.role_permission',
                'icon' => 'fa-angle-double-right',
                'route' => 'roles.index',
                'sort_order' => 1,
                'feature_key' => 'all_role',
                'status' => 1,
            ],
            [
                'name' => 'language.site_configuration',
                'icon' => 'fa-angle-double-right',
                'route' => 'settings.index',
                'route_param' => 'basic-info',
                'sort_order' => 2,
                'feature_key' => 'site_configuration',
                'status' => 1,
            ],
            [
                'name' => 'language.sidebar_menu',
                'icon' => 'fa-angle-double-right',
                'route' => 'menues.index',
                'sort_order' => 3,
                'feature_key' => 'all_sidebar_menu',
                'status' => 1,
            ]
        ];

        foreach ($settingsChildren as $childData) {
            $child = $settings->children()->create($childData);
            $this->attachPermission($child);
        }

        $communication = AuthSidebarMenu::create([
            'name' => 'Communication',
            'icon' => 'fa-comments',
            'route' => 'messages.seen',
            'sort_order' => 4,
            'feature_key' => 'communication',
            'status' => 1,
        ]);

        $this->attachPermission($communication);

        $settingsMenu = AuthSidebarMenu::create([
            'name' => 'language.settings',
            'icon' => 'fa-user-cog',
            'route' => 'change_password',
            'sort_order' => 5,
            'feature_key' => 'manage_settings',
            'status' => 1,
        ]);

        $this->attachPermission($settingsMenu);

        $blog = AuthSidebarMenu::create([
            'name' => 'language.blog',
            'icon' => 'fa-pen-to-square',
            'route' => 'blog.index',
            'sort_order' => 5,
            'feature_key' => 'manage_blog',
            'status' => 1,
        ]);

        $this->attachPermission($blog);
    }

    private function attachPermission(AuthSidebarMenu $menu)
    {
        if ($menu->feature_key) {
            $permission = Permission::where('name', $menu->feature_key)->first();
            if ($permission) {
                $menu->permissions()->newPivotStatement()->insert([
                    'id' => (string) \Illuminate\Support\Str::uuid(),
                    'auth_sidebar_menu_id' => $menu->id,
                    'permission_id' => $permission->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
