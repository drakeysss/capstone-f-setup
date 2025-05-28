<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Menu;
use Carbon\Carbon;

class MenuSeeder extends Seeder
{
    public function run()
    {
        // Sample menu data for May 24
        Menu::create([
            'name' => 'Chicken Arroz Caldo',
            'description' => 'Warm and comforting rice porridge with chicken, ginger, and garlic',
            'category' => 'breakfast',
            'meal_type' => 'breakfast',
            'date' => '2024-05-24',
            'price' => 50.00,
            'is_available' => true
        ]);

        Menu::create([
            'name' => 'Beef Caldereta',
            'description' => 'Tender beef stewed in tomato sauce with potatoes and vegetables',
            'category' => 'lunch',
            'meal_type' => 'lunch',
            'date' => '2024-05-24',
            'price' => 75.00,
            'is_available' => true
        ]);

        Menu::create([
            'name' => 'Fish Fillet with Mango Salsa',
            'description' => 'Pan-fried fish fillet topped with fresh mango salsa',
            'category' => 'dinner',
            'meal_type' => 'dinner',
            'date' => '2024-05-24',
            'price' => 65.00,
            'is_available' => true
        ]);

        // Sample menu data for May 25
        Menu::create([
            'name' => 'Tapsilog',
            'description' => 'Classic Filipino breakfast with beef tapa, garlic rice, and egg',
            'category' => 'breakfast',
            'meal_type' => 'breakfast',
            'date' => '2024-05-25',
            'price' => 55.00,
            'is_available' => true
        ]);

        Menu::create([
            'name' => 'Chicken Adobo',
            'description' => 'Chicken braised in soy sauce, vinegar, and garlic',
            'category' => 'lunch',
            'meal_type' => 'lunch',
            'date' => '2024-05-25',
            'price' => 70.00,
            'is_available' => true
        ]);

        Menu::create([
            'name' => 'Pork Sinigang',
            'description' => 'Sour soup with pork, vegetables, and tamarind broth',
            'category' => 'dinner',
            'meal_type' => 'dinner',
            'date' => '2024-05-25',
            'price' => 60.00,
            'is_available' => true
        ]);
    }
} 