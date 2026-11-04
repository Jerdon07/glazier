<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Ingredient;
use App\Models\Product;
use App\Notifications\ProductCreated;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(): View
    {
        Gate::authorize('viewAny', Product::class);

        return view('pages.products.index', [
            'products' => Auth::user()->products,
        ]);
    }

    public function show(Product $product)
    {
        Gate::authorize('view', $product);

        $product->load('recipes.ingredient');

        return view('pages.products.show', [
            'product' => $product,
        ]);
    }

    public function create(): View
    {
        Gate::authorize('create', Product::class);

        return view('pages.products.create', [
            'ingredients' => Ingredient::all(),
        ]);
    }

    public function store(ProductRequest $request)
    {
        Gate::authorize('create', Product::class);

        $product = Auth::user()->products()->create($request->validated());

        Auth::user()->notify(new ProductCreated($product));

        return redirect()->route('products.index');
    }

    public function edit(Product $product)
    {
        Gate::authorize('update', $product);

        return view('pages.products.edit', [
            'product' => $product,
        ]);
    }

    public function update(ProductRequest $request, Product $product)
    {
        Gate::authorize('update', $product);

        $product->update($request->validated());

        return redirect()->route('products.show', [
            'product' => $product->id,
        ]);
    }

    public function destroy(Product $product)
    {
        Gate::authorize('delete', $product);

        $product->delete();
        
        return redirect('products');
    }
}
