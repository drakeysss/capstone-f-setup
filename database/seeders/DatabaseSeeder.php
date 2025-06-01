<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Database\Seeders\UsersTableSeeder;
use Database\Seeders\RecipeTableSeeders;
use Database\Seeders\MenuSeeder;
use Database\Seeders\IngredientSeeder;
use Database\Seeders\WeeklyMenuOrderSeeder;

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
            MenuSeeder::class,
            IngredientSeeder::class,
            WeeklyMenuOrderSeeder::class
        ]);

        // Create default users if they don't exist
        if (!User::where('email', 'admin@example.com')->exists()) {
            User::create([
                'name' => 'Admin User',
                'email' => 'admin@example.com',
                'password' => bcrypt('password'),
                'role' => 'admin'
            ]);
        }

        if (!User::where('email', 'cook@example.com')->exists()) {
            User::create([
                'name' => 'Cook User',
                'email' => 'cook@example.com',
                'password' => bcrypt('password'),
                'role' => 'cook',
                'email_verified_at' => now(),
            ]);
        }

        if (!User::where('email', 'cook1@example.com')->exists()) {
            User::create([
                'name' => 'Cristina Manlunas',
                'email' => 'cook1@example.com',
                'password' => bcrypt('password123'),
                'role' => 'cook',
            ]);
        }

        if (!User::where('email', 'cook2@example.com')->exists()) {
            User::create([
                'name' => 'Mary Cook',
                'email' => 'cook2@example.com',
                'password' => bcrypt('password123'),
                'role' => 'cook',
            ]);
        }

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
            if (!User::where('email', $student['email'])->exists()) {
                User::create([
                    'name' => $student['name'],
                    'email' => $student['email'],
                    'password' => bcrypt('password123'),
                    'role' => 'student',
                ]);
            }
        }
    }
}
