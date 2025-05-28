<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RecipeTableSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $week1And3Menus = [
            ['recipe_day' => 'Monday', 'Breakfast' => ['name' => 'Chicken Loaf with Energen', 'ingredients' => 'Chicken Loaf, Energen, Water, Sugar'],
                'Lunch' => ['name' => 'Fried Fish', 'ingredients' => 'Fish, Cooking Oil, Salt, Pepper'],
                'Dinner' => ['name' => 'Ginisang Cabbage', 'ingredients' => 'Cabbage, Garlic, Onion, Cooking Oil, Salt']],
            ['recipe_day' => 'Tuesday', 'Breakfast' => ['name' => 'Odong with Sardines', 'ingredients' => 'Odong Noodles, Sardines, Garlic, Onion'],
                'Lunch' => ['name' => 'Fried Chicken', 'ingredients' => 'Chicken, Cooking Oil, Salt, Pepper'],
                'Dinner' => ['name' => 'Baguio Beans', 'ingredients' => 'Baguio Beans, Garlic, Onion, Cooking Oil']],
            ['recipe_day' => 'Wednesday', 'Breakfast' => ['name' => 'Hotdogs', 'ingredients' => 'Hotdogs, Cooking Oil'],
                'Lunch' => ['name' => 'Porkchop Guisado', 'ingredients' => 'Porkchop, Garlic, Onion, Soy Sauce'],
                'Dinner' => ['name' => 'Eggplant with Eggs', 'ingredients' => 'Eggplant, Eggs, Garlic, Onion']],
            ['recipe_day' => 'Thursday', 'Breakfast' => ['name' => 'Boiled Eggs with Energen', 'ingredients' => 'Eggs, Energen, Water, Sugar'],
                'Lunch' => ['name' => 'Groundpork', 'ingredients' => 'Ground Pork, Garlic, Onion, Soy Sauce'],
                'Dinner' => ['name' => 'Chopsuey', 'ingredients' => 'Mixed Vegetables, Garlic, Onion, Soy Sauce']],
            ['recipe_day' => 'Friday', 'Breakfast' => ['name' => 'Ham', 'ingredients' => 'Ham, Cooking Oil'],
                'Lunch' => ['name' => 'Fried Chicken', 'ingredients' => 'Chicken, Cooking Oil, Salt, Pepper'],
                'Dinner' => ['name' => 'Monggo Beans', 'ingredients' => 'Monggo Beans, Garlic, Onion, Malunggay']],
            ['recipe_day' => 'Saturday', 'Breakfast' => ['name' => 'Sardines with Eggs', 'ingredients' => 'Sardines, Eggs, Garlic, Onion'],
                'Lunch' => ['name' => 'Burger Steak', 'ingredients' => 'Ground Beef, Breadcrumbs, Egg, Onion'],
                'Dinner' => ['name' => 'Utan Bisaya with Buwad', 'ingredients' => 'Mixed Vegetables, Buwad, Garlic, Onion']],
            ['recipe_day' => 'Sunday', 'Breakfast' => ['name' => 'Tomato with Eggs', 'ingredients' => 'Tomatoes, Eggs, Garlic, Onion'],
                'Lunch' => ['name' => 'Fried Fish', 'ingredients' => 'Fish, Cooking Oil, Salt, Pepper'],
                'Dinner' => ['name' => 'Sari-Sari', 'ingredients' => 'Mixed Vegetables, Garlic, Onion, Cooking Oil']],
        ];

        $week2And4Menus = [
            ['recipe_day' => 'Monday', 'Breakfast' => ['name' => 'Chorizo', 'ingredients' => 'Chorizo, Cooking Oil'],
                'Lunch' => ['name' => 'Chicken Adobo', 'ingredients' => 'Chicken, Soy Sauce, Vinegar, Garlic'],
                'Dinner' => ['name' => 'String Beans Guisado', 'ingredients' => 'String Beans, Garlic, Onion, Cooking Oil']],
            ['recipe_day' => 'Tuesday', 'Breakfast' => ['name' => 'Scrambled Eggs with Energen', 'ingredients' => 'Eggs, Energen, Water, Sugar'],
                'Lunch' => ['name' => 'Fried Fish', 'ingredients' => 'Fish, Cooking Oil, Salt, Pepper'],
                'Dinner' => ['name' => 'Talong with Eggs', 'ingredients' => 'Eggplant, Eggs, Garlic, Onion']],
            ['recipe_day' => 'Wednesday', 'Breakfast' => ['name' => 'Sardines with Eggs', 'ingredients' => 'Sardines, Eggs, Garlic, Onion'],
                'Lunch' => ['name' => 'Groundpork', 'ingredients' => 'Ground Pork, Garlic, Onion, Soy Sauce'],
                'Dinner' => ['name' => 'Tinun-ang Kalabasa with Buwad', 'ingredients' => 'Kalabasa, Buwad, Garlic, Onion']],
            ['recipe_day' => 'Thursday', 'Breakfast' => ['name' => 'Luncheon Meat', 'ingredients' => 'Luncheon Meat, Cooking Oil'],
                'Lunch' => ['name' => 'Fried Chicken', 'ingredients' => 'Chicken, Cooking Oil, Salt, Pepper'],
                'Dinner' => ['name' => 'Chopsuey', 'ingredients' => 'Mixed Vegetables, Garlic, Onion, Soy Sauce']],
            ['recipe_day' => 'Friday', 'Breakfast' => ['name' => 'Sotanghon Guisado', 'ingredients' => 'Sotanghon, Garlic, Onion, Carrots'],
                'Lunch' => ['name' => 'Pork Menudo', 'ingredients' => 'Pork, Potatoes, Carrots, Tomato Sauce'],
                'Dinner' => ['name' => 'Monggo Beans', 'ingredients' => 'Monggo Beans, Garlic, Onion, Malunggay']],
            ['recipe_day' => 'Saturday', 'Breakfast' => ['name' => 'Hotdogs', 'ingredients' => 'Hotdogs, Cooking Oil'],
                'Lunch' => ['name' => 'Meatballs', 'ingredients' => 'Ground Beef, Breadcrumbs, Egg, Onion'],
                'Dinner' => ['name' => 'Utan Bisaya with Buwad', 'ingredients' => 'Mixed Vegetables, Buwad, Garlic, Onion']],
            ['recipe_day' => 'Sunday', 'Breakfast' => ['name' => 'Ampalaya with Eggs with Energen', 'ingredients' => 'Ampalaya, Eggs, Energen, Water, Sugar'],
                'Lunch' => ['name' => 'Fried Fish', 'ingredients' => 'Fish, Cooking Oil, Salt, Pepper'],
                'Dinner' => ['name' => 'Pakbit', 'ingredients' => 'Pakbit, Garlic, Onion, Cooking Oil']],
        ];

        $mealStatus = ['available', 'low stock', 'out of stock'];

        foreach($week1And3Menus as $menu) {
            foreach(['Breakfast', 'Lunch', 'Dinner'] as $type) {
                DB::table('recipes')->insert([
                    'recipe_week' => 'Week 1 & 3',
                    'recipe_day' => $menu['recipe_day'],
                    'recipe_type' => $type,
                    'recipe_name' => $menu[$type]['name'],
                    'recipe_ingredients' => $menu[$type]['ingredients'],
                    'recipe_status' => $mealStatus[array_rand($mealStatus)],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }

        foreach($week2And4Menus as $menu) {
            foreach(['Breakfast', 'Lunch', 'Dinner'] as $type) {
                DB::table('recipes')->insert([
                    'recipe_week' => 'Week 2 & 4',
                    'recipe_day' => $menu['recipe_day'],
                    'recipe_type' => $type,
                    'recipe_name' => $menu[$type]['name'],
                    'recipe_ingredients' => $menu[$type]['ingredients'],
                    'recipe_status' => $mealStatus[array_rand($mealStatus)],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}


