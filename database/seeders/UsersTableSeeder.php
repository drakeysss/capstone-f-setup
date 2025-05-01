<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        // Create admin user if not exists
        if (!User::where('email', 'admin@example.com')->exists()) {
            User::create([
                'name' => 'Admin User',
                'email' => 'admin@example.com',
                'password' => Hash::make('password123'),
                'role' => 'admin',
            ]);
        }

        // Create cook users if not exist
        $cooks = [
            [
                'name' => 'Cristina Manlunas',
                'email' => 'cook1@example.com',
                'password' => 'password123'
            ],
            [
                'name' => 'Mary Cook',
                'email' => 'cook2@example.com',
                'password' => 'password123'
            ]
        ];

        foreach ($cooks as $cook) {
            if (!User::where('email', $cook['email'])->exists()) {
                User::create([
                    'name' => $cook['name'],
                    'email' => $cook['email'],
                    'password' => Hash::make($cook['password']),
                    'role' => 'cook',
                ]);
            }
        }

        // Create student users if not exist
        $students = [
            [
                'name' => 'Jasper Drake',
                'email' => 'student1@example.com',
                'password' => 'password123'
            ],
            [
                'name' => 'Bob Student',
                'email' => 'student2@example.com',
                'password' => 'password123'
            ],
            [
                'name' => 'Alice Johnson',
                'email' => 'student3@example.com',
                'password' => 'password123'
            ],
            [
                'name' => 'Charlie Brown',
                'email' => 'student4@example.com',
                'password' => 'password123'
            ],
            [
                'name' => 'Diana Prince',
                'email' => 'student5@example.com',
                'password' => 'password123'
            ]
        ];

        foreach ($students as $student) {
            if (!User::where('email', $student['email'])->exists()) {
                User::create([
                    'name' => $student['name'],
                    'email' => $student['email'],
                    'password' => Hash::make($student['password']),
                    'role' => 'student',
                ]);
            }
        }
    }
}
