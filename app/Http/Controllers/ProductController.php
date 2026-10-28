<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Ingredient;
use App\Models\Product;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(): View
    {
        return view('pages.products.index', [
            'products' => Product::all(),
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
        Product::create($request->validated());

        return redirect('products');
    }

    public function show(Product $product)
    {
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

        return redirect('products');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        
        return redirect('products');
    }

    public function add(Product $product)
    {
        return view('pages.products.add-recipe', [
            'product' => $product,
        ]);
    }
}
