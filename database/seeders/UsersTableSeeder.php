<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        // Create admin user
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // Create student users
        User::create([
            'name' => 'Student User',
            'email' => 'student@example.com',
            'password' => Hash::make('password'),
            'role' => 'student',
        ]);

        // Create cook user
        User::create([
            'name' => 'Cook User',
            'email' => 'cook@example.com',
            'password' => Hash::make('password'),
            'role' => 'cook',
        ]);

        // Create additional students
        for ($i = 1; $i <= 5; $i++) {
            User::create([
                'name' => "Student $i",
                'email' => "student{$i}@example.com",
                'password' => Hash::make('password'),
                'role' => 'student',
            ]);
        }
    }
}
