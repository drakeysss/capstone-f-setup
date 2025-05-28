<?php

namespace Database\Seeders;

use App\Models\Ingredient;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       
        $ingredients = [
            'CHICKEN LOAF' => 37.00,
            'ENERGEN' => 100.00,
            'SARDINES' => 23.00,
            'HOTDOG' => 135.00,
            'HAM' => 60.00,
            'TOMATOES' => 80.00,
            'SIBUYAS DAHONAN' => 150.00,
            'GINISA MIX' => 65.00,
            'SUGAR' => 80.00,
            'SALT' => 20.00,
            'ONION' => 130.00,
            'GARLIC' => 130.00,
            'CHILI PEPPER' => 140.00,
            'GINGER' => 170.00,
            'PATIS' => 220.00,
            'VINEGAR' => 180.00,
            'MATCHES' => 25.00,
            'OYSTER SAUCE' => 210.00,
            'OIL' => 170.00,
            'BANANA FOR DESSERT' => 30.00,
            'APPLE' => 12.00,
            'LEMONSITO' => 80.00,
            'FLOUR' => 65.00,
            'CORNSTARCH' => 60.00,
            'KNORR CUBES' => 85.00,
            'BLACK PEPPER' => 600.00,
            'BANANA FOR SNACK' => 40.00,
            'MELON' => 40.00,
            'CONDENSED MILK' => 120.00,
            'TABLIA' => 40.00,
            'PINEAPPLE' => 50.00,
            'ORANGE' => 10.00,
            'CARROTS' => 80.00,
            'POTATO' => 70.00,
            'CHOPSOUEY' => 100.00,
            'SQUASH' => 20.00,
            'BATONG' => 80.00,
            'TALONG' => 80.00,
            'MONGOES' => 80.00,
            'BAGIUO BEANS' => 80.00,
            'ALUGBATI' => 60.00,
            'BUWAD' => 240.00,
            'KAMUNGGAY' => 100.00,
            'PITCHAY' => 50.00,
            'CABBAGE' => 40.00,
            'GROUNDPORK' => 308.00,
            'CHICKEN' => 210.00,
            'PORKCHOP' => 368.00,
            'FISH' => 220.00,
            'PORK MENUDO' => 360.00,
            'GATA' => 180.00,
            'PAKBIT' => 210.00,
            'KETCHUP' => 100.00,
            'SOTANGHON' => 380.00,
            'KAMOTE' => 230.00,
            'COCO MAMA GATA' => 210.00,
            'CHORIZO' => 210.00,
            'LANDANG' => 150.00,
            'SAGO' => 100.00,
            'UBE' => 250.00,
        ];


        // Get enum values for unit and category
        $unitEnumValues = $this->getEnumValues('ingredients', 'ingredient_unit');
        $categoryEnumValues = $this->getEnumValues('ingredients', 'ingredient_category');

        foreach ($ingredients as $ingredientName => $ingredientPrice) {
            Ingredient::create([
                'ingredient_name' => $ingredientName,
                'ingredient_category' => $categoryEnumValues[array_rand($categoryEnumValues)],
                'ingredient_unit' => $unitEnumValues[array_rand($unitEnumValues)], 
                'ingredient_price' => $ingredientPrice, 
                'ingredient_quantity' => rand(1, 100), 
            ]);
        }
    }
    private function getEnumValues(string $table, string $column): array
    {
        // Fetch the column type using a properly formatted SQL query
        $result = DB::select("SHOW COLUMNS FROM {$table} WHERE Field = '{$column}'");
    
        // Ensure the result is not empty
        if (empty($result)) {
            throw new \Exception("Column '{$column}' not found in table '{$table}'");
        }
    
        // Extract the ENUM type definition
        $type = $result[0]->Type;
        preg_match('/enum\((.*)\)/', $type, $matches);
    
        // Parse the ENUM values into an array
        if (!isset($matches[1])) {
            throw new \Exception("No ENUM values found for column '{$column}'");
        }
    
        $enumValues = array_map(fn($value) => trim($value, "'"), explode(',', $matches[1]));
        return $enumValues;
    }
}
