<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RecipeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $recipes = [

            // Week 1 & 3
            ['recipe_week' => 'Week 1 & 3', 'recipe_day' => 'Monday', 'recipe_type' => 'Breakfast', 'recipe_name' => 'Chicken Loaf with Energen', 'recipe_status' => 'available'],
            ['recipe_week' => 'Week 1 & 3', 'recipe_day' => 'Monday', 'recipe_type' => 'Lunch', 'recipe_name' => 'Fried Fish', 'recipe_status' => 'available'],
            ['recipe_week' => 'Week 1 & 3', 'recipe_day' => 'Monday', 'recipe_type' => 'Dinner', 'recipe_name' => 'Ginisang Cabbage', 'recipe_status' => 'available'],
            ['recipe_week' => 'Week 1 & 3', 'recipe_day' => 'Saturday', 'recipe_type' => 'Snacks', 'recipe_name' => 'Sopas / Lugaw', 'recipe_status' => 'available'],
            ['recipe_week' => 'Week 1 & 3', 'recipe_day' => 'Tuesday', 'recipe_type' => 'Breakfast', 'recipe_name' => 'Odong with Sardines', 'recipe_status' => 'available'],
            ['recipe_week' => 'Week 1 & 3', 'recipe_day' => 'Tuesday', 'recipe_type' => 'Lunch', 'recipe_name' => 'Fried Chicken', 'recipe_status' => 'available'],
            ['recipe_week' => 'Week 1 & 3', 'recipe_day' => 'Tuesday', 'recipe_type' => 'Dinner', 'recipe_name' => 'Baguio Beans', 'recipe_status' => 'available'],
            ['recipe_week' => 'Week 1 & 3', 'recipe_day' => 'Sunday', 'recipe_type' => 'Snacks', 'recipe_name' => 'Bananacue', 'recipe_status' => 'available'],
            ['recipe_week' => 'Week 1 & 3', 'recipe_day' => 'Wednesday', 'recipe_type' => 'Breakfast', 'recipe_name' => 'Hotdogs', 'recipe_status' => 'available'],
            ['recipe_week' => 'Week 1 & 3', 'recipe_day' => 'Wednesday', 'recipe_type' => 'Lunch', 'recipe_name' => 'Porkchop Guisado', 'recipe_status' => 'available'],
            ['recipe_week' => 'Week 1 & 3', 'recipe_day' => 'Wednesday', 'recipe_type' => 'Dinner', 'recipe_name' => 'Eggplant with Eggs', 'recipe_status' => 'available'],
            ['recipe_week' => 'Week 1 & 3', 'recipe_day' => 'Thursday', 'recipe_type' => 'Breakfast', 'recipe_name' => 'Boiled Eggs with Energen', 'recipe_status' => 'available'],
            ['recipe_week' => 'Week 1 & 3', 'recipe_day' => 'Thursday', 'recipe_type' => 'Lunch', 'recipe_name' => 'Pork Minudo', 'recipe_status' => 'available'],
            ['recipe_week' => 'Week 1 & 3', 'recipe_day' => 'Thursday', 'recipe_type' => 'Dinner', 'recipe_name' => 'Chopsuey', 'recipe_status' => 'available'],
            ['recipe_week' => 'Week 1 & 3', 'recipe_day' => 'Thursday', 'recipe_type' => 'Snacks', 'recipe_name' => 'Fruits', 'recipe_status' => 'available'],
            ['recipe_week' => 'Week 1 & 3', 'recipe_day' => 'Friday', 'recipe_type' => 'Breakfast', 'recipe_name' => 'Ham', 'recipe_status' => 'available'],
            ['recipe_week' => 'Week 1 & 3', 'recipe_day' => 'Friday', 'recipe_type' => 'Lunch', 'recipe_name' => 'Fried Chicken', 'recipe_status' => 'available'],
            ['recipe_week' => 'Week 1 & 3', 'recipe_day' => 'Friday', 'recipe_type' => 'Dinner', 'recipe_name' => 'Monggo Beans', 'recipe_status' => 'available'],
            ['recipe_week' => 'Week 1 & 3', 'recipe_day' => 'Friday', 'recipe_type' => 'Snacks', 'recipe_name' => 'Apple, Orange, Pineapple, Watermelon, Banana', 'recipe_status' => 'available'],
            ['recipe_week' => 'Week 1 & 3', 'recipe_day' => 'Saturday', 'recipe_type' => 'Breakfast', 'recipe_name' => 'Sardines with Eggs', 'recipe_status' => 'available'],
            ['recipe_week' => 'Week 1 & 3', 'recipe_day' => 'Saturday', 'recipe_type' => 'Lunch', 'recipe_name' => 'Burger Steak', 'recipe_status' => 'available'],
            ['recipe_week' => 'Week 1 & 3', 'recipe_day' => 'Saturday', 'recipe_type' => 'Dinner', 'recipe_name' => 'Utan Bisaya with Buwad', 'recipe_status' => 'available'],
            ['recipe_week' => 'Week 1 & 3', 'recipe_day' => 'Sunday', 'recipe_type' => 'Breakfast', 'recipe_name' => 'Tomato with Eggs', 'recipe_status' => 'available'],
            ['recipe_week' => 'Week 1 & 3', 'recipe_day' => 'Sunday', 'recipe_type' => 'Lunch', 'recipe_name' => 'Fried Fish', 'recipe_status' => 'available'],
            ['recipe_week' => 'Week 1 & 3', 'recipe_day' => 'Sunday', 'recipe_type' => 'Dinner', 'recipe_name' => 'Sari-Sari', 'recipe_status' => 'available'],

            // Week 2 & 4
            ['recipe_week' => 'Week 2 & 4', 'recipe_day' => 'Monday', 'recipe_type' => 'Breakfast', 'recipe_name' => 'Chorizo', 'recipe_status' => 'available'],
            ['recipe_week' => 'Week 2 & 4', 'recipe_day' => 'Monday', 'recipe_type' => 'Lunch', 'recipe_name' => 'Chicken Adobo', 'recipe_status' => 'available'],
            ['recipe_week' => 'Week 2 & 4', 'recipe_day' => 'Monday', 'recipe_type' => 'Dinner', 'recipe_name' => 'String Beans Guisado', 'recipe_status' => 'available'],
            ['recipe_week' => 'Week 2 & 4', 'recipe_day' => 'Saturday', 'recipe_type' => 'Snacks', 'recipe_name' => 'Champorado', 'recipe_status' => 'available'],
            ['recipe_week' => 'Week 2 & 4', 'recipe_day' => 'Tuesday', 'recipe_type' => 'Breakfast', 'recipe_name' => 'Scrambled Eggs with Energen', 'recipe_status' => 'available'],
            ['recipe_week' => 'Week 2 & 4', 'recipe_day' => 'Tuesday', 'recipe_type' => 'Lunch', 'recipe_name' => 'Fried Fish', 'recipe_status' => 'available'],
            ['recipe_week' => 'Week 2 & 4', 'recipe_day' => 'Tuesday', 'recipe_type' => 'Dinner', 'recipe_name' => 'Talong with Eggs', 'recipe_status' => 'available'],
            ['recipe_week' => 'Week 2 & 4', 'recipe_day' => 'Sunday', 'recipe_type' => 'Snacks', 'recipe_name' => 'Nilung-ag nga Kamote', 'recipe_status' => 'available'],
            ['recipe_week' => 'Week 2 & 4', 'recipe_day' => 'Wednesday', 'recipe_type' => 'Breakfast', 'recipe_name' => 'Sardines with Eggs', 'recipe_status' => 'available'],
            ['recipe_week' => 'Week 2 & 4', 'recipe_day' => 'Wednesday', 'recipe_type' => 'Lunch', 'recipe_name' => 'Porkchop', 'recipe_status' => 'available'],
            ['recipe_week' => 'Week 2 & 4', 'recipe_day' => 'Wednesday', 'recipe_type' => 'Dinner', 'recipe_name' => 'Tinun-ang Kalabasa with Buwad', 'recipe_status' => 'available'],
            ['recipe_week' => 'Week 2 & 4', 'recipe_day' => 'Thursday', 'recipe_type' => 'Breakfast', 'recipe_name' => 'Luncheon Meat', 'recipe_status' => 'available'],
            ['recipe_week' => 'Week 2 & 4', 'recipe_day' => 'Thursday', 'recipe_type' => 'Lunch', 'recipe_name' => 'Fried Chicken', 'recipe_status' => 'available'],
            ['recipe_week' => 'Week 2 & 4', 'recipe_day' => 'Thursday', 'recipe_type' => 'Dinner', 'recipe_name' => 'Chopsuey', 'recipe_status' => 'available'],
            ['recipe_week' => 'Week 2 & 4', 'recipe_day' => 'Thursday', 'recipe_type' => 'Snacks', 'recipe_name' => 'Fruit', 'recipe_status' => 'available'],
            ['recipe_week' => 'Week 2 & 4', 'recipe_day' => 'Friday', 'recipe_type' => 'Breakfast', 'recipe_name' => 'Sotanghon Guisado', 'recipe_status' => 'available'],
            ['recipe_week' => 'Week 2 & 4', 'recipe_day' => 'Friday', 'recipe_type' => 'Lunch', 'recipe_name' => 'Pork Menudo', 'recipe_status' => 'available'],
            ['recipe_week' => 'Week 2 & 4', 'recipe_day' => 'Friday', 'recipe_type' => 'Dinner', 'recipe_name' => 'Monggo Beans', 'recipe_status' => 'available'],
            ['recipe_week' => 'Week 2 & 4', 'recipe_day' => 'Friday', 'recipe_type' => 'Snacks', 'recipe_name' => 'Apple, Orange, Pineapple, Watermelon, Banana', 'recipe_status' => 'available'],
            ['recipe_week' => 'Week 2 & 4', 'recipe_day' => 'Saturday', 'recipe_type' => 'Breakfast', 'recipe_name' => 'Hotdogs', 'recipe_status' => 'available'],
            ['recipe_week' => 'Week 2 & 4', 'recipe_day' => 'Saturday', 'recipe_type' => 'Lunch', 'recipe_name' => 'Meatballs', 'recipe_status' => 'available'],
            ['recipe_week' => 'Week 2 & 4', 'recipe_day' => 'Saturday', 'recipe_type' => 'Dinner', 'recipe_name' => 'Utan Bisaya with Buwad', 'recipe_status' => 'available'],
            ['recipe_week' => 'Week 2 & 4', 'recipe_day' => 'Sunday', 'recipe_type' => 'Breakfast', 'recipe_name' => 'Ampalaya with Eggs with Energen', 'recipe_status' => 'available'],
            ['recipe_week' => 'Week 2 & 4', 'recipe_day' => 'Sunday', 'recipe_type' => 'Lunch', 'recipe_name' => 'Fried Fish', 'recipe_status' => 'available'],
            ['recipe_week' => 'Week 2 & 4', 'recipe_day' => 'Sunday', 'recipe_type' => 'Dinner', 'recipe_name' => 'Pakbit', 'recipe_status' => 'available'],
        ];

        DB::table('recipes')->insert($recipes);
    }
}
