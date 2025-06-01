<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\WeeklyMenuOrder;
use App\Models\Recipe;

class WeeklyMenuOrderSeeder extends Seeder
{
    public function run()
    {
        // Get all recipes from the recipes table
        $recipes = Recipe::all();

        // Group recipes by week and day
        $groupedRecipes = [];
        foreach ($recipes as $recipe) {
            $groupedRecipes[$recipe->recipe_week][$recipe->recipe_day][$recipe->recipe_type] = [
                'name' => $recipe->recipe_name,
                'status' => $recipe->recipe_status
            ];
        }

        // Create weekly menu orders based on the recipes
        foreach ($groupedRecipes as $week => $days) {
            foreach ($days as $day => $mealTypes) {
                foreach ($mealTypes as $mealType => $recipe) {
                    WeeklyMenuOrder::create([
                        'week' => $week,
                        'day' => $day,
                        'meal_type' => $mealType,
                        'menu_item' => $recipe['name'],
                        'ingredients' => 'Ingredients will be added by cook', // This can be updated later by the cook
                        'is_editable' => true
                    ]);
                }
            }
        }
    }
} 