<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Ingredient;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(): View
    {
        return view('pages.products.index', [
            'products' => Auth::user()->products,
        ]);
    }

    public function create(): View
    {

        return view('pages.products.create', [
            'ingredients' => Ingredient::all(),
        ]);
    }

    public function store(ProductRequest $request)
    {
        Auth::user()->products()->create($request->validated());

        return redirect()->route('products.index');
    }

    public function show(Product $product)
    {
        $product->load('recipes.ingredient');

        return view('pages.products.show', [
            'product' => $product,
        ]);
    }

    public function edit(Product $product)
    {
        return view('pages.products.edit', [
            'product' => $product,
        ]);
    }

    public function update(ProductRequest $request, Product $product)
    {
        $product->update($request->validated());

        return redirect()->route('products.show', [
            'product' => $product->id,
        ]);
    }

    public function destroy(Product $product)
    {
        $product->delete();
        
        return redirect('products');
    }
}
