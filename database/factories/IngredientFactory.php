<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ingredient>
 */
class IngredientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    /**
     * The name of the model that this factory is for.
     *
     * @var string
     */
    protected $model = \App\Models\Ingredient::class;

    public function definition(): array
    {
        $units = ['kg', 'g', 'pcs', 'liters', 'ml'];
        $categories = ['Meat', 'Vegetables', 'Fruits', 'Dairy', 'Grains', 'Condiments'];

        return [
            'ingredient_name' => $this->faker->word(),
            'ingredient-category' => $this->faker->randomElement($categories),
            'ingredient_unit' => $this->faker->randomElement($units),
            'ingredient_price' => $this->faker->randomFloat(2, 1, 100),
            'ingredient_quantity' => $this->faker->numberBetween(1, 100),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
