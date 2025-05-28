<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UsersTableSeeder::class
        ]);

        $this->call([
            RecipeTableSeeder::class
        ]);

<<<<<<< HEAD
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

        $this->call([
            StudentMealSeeder::class,
            MenuSeeder::class,
        ]);
=======
>>>>>>> c17d1de84e4f3910ce17173a1b62957779106452
    }
}
