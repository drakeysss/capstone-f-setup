<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create admin user
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);

        // Create cook users
        User::create([
            'name' => 'Cristina Manlunas',
            'email' => 'cook1@example.com',
            'password' => Hash::make('cook123'),
            'role' => 'cook',
        ]);

        User::create([
            'name' => 'Mary Cook',
            'email' => 'cook2@example.com',
            'password' => Hash::make('cook123'),
            'role' => 'cook',
        ]);

        // Create student users
        User::create([
            'name' => 'Jasper Drake',
            'email' => 'student1@example.com',
            'password' => Hash::make('student123'),
            'role' => 'student',
        ]);

        User::create([
            'name' => 'Bob Student',
            'email' => 'student2@example.com',
            'password' => Hash::make('student123'),
            'role' => 'student',
        ]);
    }
} 