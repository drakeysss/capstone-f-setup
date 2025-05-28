<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Database\Seeders\UsersTableSeeder;
use Database\Seeders\RecipeTableSeeders;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([

            UsersTableSeeder::class,
            RecipeTableSeeders::class,
        ]);

        // Create Admin User
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password123'),
            'role' => 'admin',
        ]);

        // Create Cook Users
        User::create([
            'name' => 'Cook User',
            'email' => 'cook@example.com',
            'password' => Hash::make('password'),
            'role' => 'cook',
            'email_verified_at' => now(),
        ]);

        User::create([
            'name' => 'Cristina Manlunas',
            'email' => 'cook1@example.com',
            'password' => Hash::make('password123'),
            'role' => 'cook',
        ]);

        User::create([
            'name' => 'Mary Cook',
            'email' => 'cook2@example.com',
            'password' => Hash::make('password123'),
            'role' => 'cook',
        ]);

        // Create Student Users
        $students = [
            [
                'name' => 'Jasper Drake',
                'email' => 'student1@example.com',
            ],
            [
                'name' => 'Bob Student',
                'email' => 'student2@example.com',
            ],
            [
                'name' => 'Alice Johnson',
                'email' => 'student3@example.com',
            ],
            [
                'name' => 'Charlie Brown',
                'email' => 'student4@example.com',
            ],
            [
                'name' => 'Diana Prince',
                'email' => 'student5@example.com',
            ],
        ];

        foreach ($students as $student) {
            User::create([
                'name' => $student['name'],
                'email' => $student['email'],
                'password' => Hash::make('password123'),
                'role' => 'student',
            ]);
        }
    }
}
