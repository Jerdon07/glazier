<?php

namespace App\Models;

use App\Enums\Enums\IngredientUnitsEnum;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Override;

#[Fillable(['name', 'unit', 'cost_per_unit'])]
class Ingredient extends Model
{
    /** @use HasFactory<\Database\Factories\IngredientFactory> */
    use HasFactory;

    protected function casts()
    {
        return [
            'unit' => IngredientUnitsEnum::class,
        ];
    }
}
