<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                'name' => 'Admin',
                'email' => 'admin@jobportal.com',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
            ],
            [
                'name' => 'User Satu',
                'email' => 'user1@jobportal.com',
                'password' => Hash::make('user123'),
                'role' => 'user',
            ],
            [
                'name' => 'User Dua',
                'email' => 'user2@jobportal.com',
                'password' => Hash::make('user123'),
                'role' => 'user',
            ],
            [
                'name' => 'User Tiga',
                'email' => 'user3@jobportal.com',
                'password' => Hash::make('user123'),
                'role' => 'user',
            ],
            [
                'name' => 'User Empat',
                'email' => 'user4@jobportal.com',
                'password' => Hash::make('user123'),
                'role' => 'user',
            ],
            [
                'name' => 'User Lima',
                'email' => 'user5@jobportal.com',
                'password' => Hash::make('user123'),
                'role' => 'user',
            ],
            [
                'name' => 'User Enam',
                'email' => 'user6@jobportal.com',
                'password' => Hash::make('user123'),
                'role' => 'user',
            ],
            [
                'name' => 'User Tujuh',
                'email' => 'user7@jobportal.com',
                'password' => Hash::make('user123'),
                'role' => 'user',
            ],
            [
                'name' => 'User Delapan',
                'email' => 'user8@jobportal.com',
                'password' => Hash::make('user123'),
                'role' => 'user',
            ],
            [
                'name' => 'User Sembilan',
                'email' => 'user9@jobportal.com',
                'password' => Hash::make('user123'),
                'role' => 'user',
            ],
            [
                'name' => 'User Sepuluh',
                'email' => 'user10@jobportal.com',
                'password' => Hash::make('user123'),
                'role' => 'user',
            ],
        ];
        foreach ($users as $user) {
            User::create($user);
        }
    }
}
