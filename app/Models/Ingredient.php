<?php

namespace App\Models;

use App\Enums\Enums\IngredientUnitsEnum;
use Database\Factories\IngredientFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['name', 'unit', 'cost_per_unit'])]
class Ingredient extends Model
{
    /** @use HasFactory<IngredientFactory> */
    use HasFactory;

    protected function casts()
    {
        return [
            'unit' => IngredientUnitsEnum::class,
        ];
    }
}
