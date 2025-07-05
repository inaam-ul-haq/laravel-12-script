<?php

namespace Database\Seeders;

use App\Constants\Constants;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user1 = new User();
        $user1->first_name = 'admin';
        $user1->last_name = 'admin';
        $user1->about = "This is little bit more about my self. I'm the admin of this website.";
        $user1->email = 'admin@gmail.com';
        $user1->password = Hash::make('admin123');
        $user1->email_verified_at = now();
        $user1->created_at = now();
        $user1->save();
        $user1->assignRole(Constants::SUPERADMIN);
        $user1->file()->create(['name' => 'avatar.png', 'path' => 'users/avatar.png', 'type' => 'profile']);

        $user2 = new User();
        $user2->first_name = 'User';
        $user2->last_name = 'user';
        $user2->about = "This is little bit more about my self. I'm the user of this website.";
        $user2->email = 'user@gmail.com';
        $user2->password = Hash::make('test123');
        $user2->email_verified_at = now();
        $user2->created_at = now();
        $user2->save();
        $user2->assignRole(Constants::USER);
        $user2->file()->create(['name' => 'avatar.png', 'path' => 'users/avatar.png', 'type' => 'profile']);
    }
}
