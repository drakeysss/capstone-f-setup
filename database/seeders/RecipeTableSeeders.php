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
            ['recipe_day' => 'Monday', 'Breakfast' => 'Chicken Loaf with Energen', 'Lunch' => 'Fried Fish', 'Dinner' => 'Ginisang Cabbage'],
            ['recipe_day' => 'Tuesday', 'Breakfast' => 'Odong with Sardines', 'Lunch' => 'Fried Chicken', 'Dinner' => 'Baguio Beans'],
            ['recipe_day' => 'Wednesday', 'Breakfast' => 'Hotdogs', 'Lunch' => 'Porkchop Guisado', 'Dinner' => 'Eggplant with Eggs'],
            ['recipe_day' => 'Thursday', 'Breakfast' => 'Boiled Eggs with Energen', 'Lunch' => 'Groundpork', 'Dinner' => 'Chopsuey'],
            ['recipe_day' => 'Friday', 'Breakfast' => 'Ham', 'Lunch' => 'Fried Chicken', 'Dinner' => 'Monggo Beans'],
            ['recipe_day' => 'Saturday', 'Breakfast' => 'Sardines with Eggs', 'Lunch' => 'Burger Steak', 'Dinner' => 'Utan Bisaya with Buwad'],
            ['recipe_day' => 'Sunday', 'Breakfast' => 'Tomato with Eggs', 'Lunch' => 'Fried Fish', 'Dinner' => 'Sari-Sari'],
        ];

        $week2And4Menus = [
            ['recipe_day' => 'Monday', 'Breakfast' => 'Chorizo', 'Lunch' => 'Chicken Adobo', 'Dinner' => 'String Beans Guisado'],
            ['recipe_day' => 'Tuesday', 'Breakfast' => 'Scrambled Eggs with Energen', 'Lunch' => 'Fried Fish', 'Dinner' => 'Talong with Eggs'],
            ['recipe_day' => 'Wednesday', 'Breakfast' => 'Sardines with Eggs', 'Lunch' => 'Groundpork', 'Dinner' => 'Tinun-ang Kalabasa with Buwad'],
            ['recipe_day' => 'Thursday', 'Breakfast' => 'Luncheon Meat', 'Lunch' => 'Fried Chicken', 'Dinner' => 'Chopsuey'],
            ['recipe_day' => 'Friday', 'Breakfast' => 'Sotanghon Guisado', 'Lunch' => 'Pork Menudo', 'Dinner' => 'Monggo Beans'],
            ['recipe_day' => 'Saturday', 'Breakfast' => 'Hotdogs', 'Lunch' => 'Meatballs', 'Dinner' => 'Utan Bisaya with Buwad'],
            ['recipe_day' => 'Sunday', 'Breakfast' => 'Ampalaya with Eggs with Energen', 'Lunch' => 'Fried Fish', 'Dinner' => 'Pakbit'],
        ];

        $mealStatus = ['available', 'low stock', 'out of stock'];

            foreach($week1And3Menus as $menu){
                foreach(['Breakfast','Lunch','Dinner'] as $type){
                    DB::table('recipes')->insert([
                        'recipe_week' => 'Week 1 & 3',
                        'recipe_day' => $menu['recipe_day'],
                        'recipe_type' => $type,
                        'recipe_name' => $menu[$type],
                        'recipe_status' => $mealStatus[array_rand($mealStatus)],
                        'created_at' => now(),
                        'updated_at' => now(),

                    ]);
                }

            }
            foreach ($week2And4Menus as $menu) {
            foreach (['Breakfast', 'Lunch', 'Dinner'] as $meal) {
                DB::table('recipes')->insert([
                    'recipe_week' => 'Week 2 & 4',
                    'recipe_day' => $menu['recipe_day'],
                    'recipe_type' => $meal,
                    'recipe_name' => $menu[$meal],
                    'recipe_status' => $mealStatus[array_rand($mealStatus)],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
        }
    }


