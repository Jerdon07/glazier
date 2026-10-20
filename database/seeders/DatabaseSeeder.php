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
        User::factory(10)->create();

        User::factory()->create([
            'name' => 'Jerdon Litaoen',
            'email' => 'jdlitaoen@gmail.com',
        ]);

        $this->call([
            ProductSeeder::class,
            IngredientSeeder::class,
            RecipeSeeder::class,
        ]);
    }
}
