<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        User::factory()->create([
            'name' => 'Jerdon Litaoen',
            'email' => 'jdlitaoen@gmail.com',
        ]);

        User::factory(9)->create();

        $this->call([
            ProductSeeder::class,
            IngredientSeeder::class,
            RecipeSeeder::class,
        ]);
    }
}
