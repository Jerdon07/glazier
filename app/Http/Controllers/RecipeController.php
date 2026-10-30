<?php

namespace App\Http\Controllers;

use App\Http\Requests\RecipeRequest;
use App\Models\Ingredient;
use App\Models\Product;
use App\Models\Recipe;

class RecipeController extends Controller
{
    public function create(Product $product)
    {
        return view('pages.products.recipes.create', [
            'product' => $product,
            'ingredients' => Ingredient::all(),
        ]);
    }

    public function store(RecipeRequest $request)
    {

        Recipe::create($request->validated());

        return redirect()->route('products.show', [
            'product' => $request->validated()['product_id'],
        ]);
    }

    public function edit(Product $product, Recipe $recipe)
    {
        return view('pages.products.recipes.edit', [
            'product' => $product,
            'recipe' => $recipe,
            'ingredients' => Ingredient::all(),
        ]);
    }

    public function update(RecipeRequest $request, Product $product, Recipe $recipe)
    {
        $recipe->update($request->validated());

        return redirect()->route('products.show', [
            'product' => $product->id,
        ]);
    }

    public function destroy(Product $product, Recipe $recipe)
    {
        $recipe->delete();

        return redirect()->route('products.show', [
            'product' => $product->id,
        ]);
    }
}
