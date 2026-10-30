<?php

namespace App\Http\Controllers;

use App\Http\Requests\IngredientRequest;
use App\Models\Ingredient;

class IngredientController extends Controller
{
    public function index()
    {
        return view('pages.ingredients.index', [
            'ingredients' => Ingredient::all(),
        ]);
    }

    public function create()
    {
        return view('pages.ingredients.create');
    }

    public function store(IngredientRequest $request)
    {
        Ingredient::create($request->validated());

        return redirect()->route('ingredients.index');
    }

    public function edit(Ingredient $ingredient)
    {
        return view('pages.ingredients.edit', [
            'ingredient' => $ingredient,
        ]);
    }

    public function update(IngredientRequest $request, Ingredient $ingredient)
    {
        $ingredient->update($request->validated());

        return redirect()->route('ingredients.show', [
            'ingredient' => $ingredient->id,
        ]);
    }

    public function destroy(Ingredient $ingredient)
    {
        $ingredient->delete();

        return redirect()->route('ingredients.index');
    }
}
