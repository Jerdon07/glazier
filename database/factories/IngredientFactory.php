<?php

namespace Database\Factories;

use App\Models\Ingredient;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Ingredient>
 */
class IngredientFactory extends Factory
{
    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->word(),
            'unit' => 'cup',
            'cost_per_unit' => fake()->numberBetween(50, 500),
            'stock_quantity' => fake()->numberBetween(1, 10),
        ];
    }
}
