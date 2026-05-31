<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder; 
use App\Models\User;
use App\Enums\UserPanelEnum;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Super Admin User
        $super_admin = User::query()->updateOrCreate(
            [
                'email' => 'super_admin@mail.com',
                'name' => 'Super Admin User',
                'password' => bcrypt('123'),
            ]
        );

        $super_admin->assignRole('super_admin');
    }
}