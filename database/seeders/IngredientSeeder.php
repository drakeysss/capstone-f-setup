<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('ingredients')->insert([
            [
                'name' => 'Flour',
                'unit' => 'grams',
                'quantity' => 500,
                'price' => 1.50,
                'recipe_id' => 1,
            ],
            [
                'name' => 'Sugar',
                'unit' => 'grams',
                'quantity' => 200,
                'price' => 0.80,
                'recipe_id' => 1,
            ],
            [
                'name' => 'Butter',
                'unit' => 'grams',
                'quantity' => 100,
                'price' => 2.00,
                'recipe_id' => 1,
            ],
        ]);

    }
}
