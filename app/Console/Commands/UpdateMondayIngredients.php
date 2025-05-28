<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\WeeklyMenuOrder;

class UpdateMondayIngredients extends Command
{
    protected $signature = 'update:monday-ingredients';
    protected $description = 'Update Monday Week 2 & 4 ingredients for all meals';

    public function handle()
    {
        $breakfast = WeeklyMenuOrder::where('week', 'Week 2 & 4')->where('day', 'Monday')->where('meal_type', 'Breakfast')->first();
        if ($breakfast) {
            $breakfast->menu_item = "CHORIZO";
            $breakfast->ingredients = "mantika\nasin\nsuka";
            $breakfast->save();
        }
        $lunch = WeeklyMenuOrder::where('week', 'Week 2 & 4')->where('day', 'Monday')->where('meal_type', 'Lunch')->first();
        if ($lunch) {
            $lunch->menu_item = "ADOBO";
            $lunch->ingredients = "asukal\npaminta\nmantika";
            $lunch->save();
        }
        $dinner = WeeklyMenuOrder::where('week', 'Week 2 & 4')->where('day', 'Monday')->where('meal_type', 'Dinner')->first();
        if ($dinner) {
            $dinner->menu_item = "STRING BEANS GUISADO";
            $dinner->ingredients = "ketchup\nmanitka\nasukal";
            $dinner->save();
        }
        $this->info('Monday menu and ingredients updated successfully.');
    }
} 