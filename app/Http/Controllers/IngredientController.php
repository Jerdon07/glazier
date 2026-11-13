<?php

namespace App\Http\Controllers;

use App\Enums\Enums\IngredientUnitsEnum;
use App\Http\Requests\IngredientRequest;
use App\Models\Ingredient;
use App\Notifications\IngredientCreated;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class IngredientController extends Controller
{
    public function index()
    {
        Gate::authorize('viewAny', Ingredient::class);

        return view('pages.ingredients.index', [
            'ingredients' => Ingredient::all(),
        ]);
    }

    public function create()
    {
        Gate::authorize('viewAny', Ingredient::class);

        return view('pages.ingredients.create', [
            'units' => IngredientUnitsEnum::cases(),
        ]);
    }

    public function store(IngredientRequest $request)
    {
        Gate::authorize('viewAny', Ingredient::class);
        
        $ingredient = Ingredient::create($request->validated());

        Auth::user()->notify(new IngredientCreated($ingredient));

        return redirect()->route('ingredients.index');
    }

    public function edit(Ingredient $ingredient)
    {
        Gate::authorize('viewAny', $ingredient);

        return view('pages.ingredients.edit', [
            'ingredient' => $ingredient,
            'units' => IngredientUnitsEnum::cases(),
        ]);
    }

    public function update(IngredientRequest $request, Ingredient $ingredient)
    {
        Gate::authorize('viewAny', $ingredient);

        $ingredient->update($request->validated());

        return redirect()->route('ingredients.index');
    }

    public function destroy(Ingredient $ingredient)
    {
        Gate::authorize('viewAny', $ingredient);

        $ingredient->delete();

        return redirect()->route('ingredients.index');
    }
}
