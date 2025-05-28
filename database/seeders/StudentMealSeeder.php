<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\StudentMeal;
use Carbon\Carbon;

class StudentMealSeeder extends Seeder
{
    public function run()
    {
        // Get today's date
        $today = Carbon::today();
        
        // Sample meals for the past week
        $meals = [
            // Today
            [
                'user_id' => 1, // Assuming user ID 1 is a student
                'meal_type' => 'breakfast',
                'menu_item' => 'Pancakes with Maple Syrup',
                'calories' => 450,
                'protein' => 8.5,
                'carbs' => 65.2,
                'fats' => 15.3,
                'consumed_at' => $today->copy()->setTime(7, 0)
            ],
            [
                'user_id' => 1,
                'meal_type' => 'lunch',
                'menu_item' => 'Chicken Adobo with Rice',
                'calories' => 650,
                'protein' => 35.2,
                'carbs' => 75.8,
                'fats' => 22.5,
                'consumed_at' => $today->copy()->setTime(12, 0)
            ],
            [
                'user_id' => 1,
                'meal_type' => 'dinner',
                'menu_item' => 'Grilled Pork Steak with Vegetables',
                'calories' => 580,
                'protein' => 42.3,
                'carbs' => 45.6,
                'fats' => 28.9,
                'consumed_at' => $today->copy()->setTime(18, 0)
            ],

            // Yesterday
            [
                'user_id' => 1,
                'meal_type' => 'breakfast',
                'menu_item' => 'Oatmeal with Fresh Fruits',
                'calories' => 380,
                'protein' => 12.5,
                'carbs' => 58.3,
                'fats' => 8.2,
                'consumed_at' => $today->copy()->subDay()->setTime(7, 0)
            ],
            [
                'user_id' => 1,
                'meal_type' => 'lunch',
                'menu_item' => 'Sinigang na Baboy',
                'calories' => 520,
                'protein' => 28.7,
                'carbs' => 45.2,
                'fats' => 18.5,
                'consumed_at' => $today->copy()->subDay()->setTime(12, 0)
            ],
            [
                'user_id' => 1,
                'meal_type' => 'dinner',
                'menu_item' => 'Fish Fillet with Tartar Sauce',
                'calories' => 420,
                'protein' => 35.8,
                'carbs' => 32.4,
                'fats' => 15.6,
                'consumed_at' => $today->copy()->subDay()->setTime(18, 0)
            ],

            // 2 days ago
            [
                'user_id' => 1,
                'meal_type' => 'breakfast',
                'menu_item' => 'Toast & Scrambled Eggs',
                'calories' => 350,
                'protein' => 15.2,
                'carbs' => 42.5,
                'fats' => 12.8,
                'consumed_at' => $today->copy()->subDays(2)->setTime(7, 0)
            ],
            [
                'user_id' => 1,
                'meal_type' => 'lunch',
                'menu_item' => 'Menudo with Rice',
                'calories' => 580,
                'protein' => 32.5,
                'carbs' => 65.8,
                'fats' => 20.3,
                'consumed_at' => $today->copy()->subDays(2)->setTime(12, 0)
            ],
            [
                'user_id' => 1,
                'meal_type' => 'dinner',
                'menu_item' => 'Chicken BBQ with Rice',
                'calories' => 520,
                'protein' => 38.6,
                'carbs' => 55.2,
                'fats' => 18.9,
                'consumed_at' => $today->copy()->subDays(2)->setTime(18, 0)
            ]
        ];

        // Insert the sample meals
        foreach ($meals as $meal) {
            StudentMeal::create($meal);
        }
    }
} 