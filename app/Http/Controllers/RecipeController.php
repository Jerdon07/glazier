<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use App\Models\Product;
use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function create(Product $product)
    {
        return view('pages.products.recipes.create', [
            'product' => $product,
            'ingredients' => Ingredient::all(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_id' => ['required'],
            'ingredient_id' => ['required'],
            'quantity_required' => ['required'],
        ]);

        Recipe::create($validated);

        return redirect()->route('products.show', [
            'product' => $validated['product_id'],
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
