<?php

namespace Database\Factories;

use App\Models\Ingredient;
use App\Models\Product;
use App\Models\Recipe;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Recipe>
 */
class RecipeFactory extends Factory
{
    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_id' => Product::inRandomOrder()->value('id'),
            'ingredient_id' => Ingredient::inRandomOrder()->value('id'),
            'quantity_required' => fake()->numberBetween(1, 20)
        ];
    }
}
