<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
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
        return view('pages.products.create');
    }

    public function store(Request $request)
    {
        $request->merge([
            'is_available' => $request->boolean('is_available'),
        ]);

        $validated = $request->validate([
            'name' => ['required', 'min:3', 'max:255'],
            'price' => ['required', 'numeric', 'min:10', 'max:100'],
            'is_available' => ['required', 'boolean'],
            'description' => ['nullable', 'max:600'],
        ]);

        Product::create($validated);

        return redirect('/products');
    }

    public function show(Product $product)
    {
        return view('pages.products.show', [
            'product' => $product,
        ]);
    }

    public function edit(Product $product)
    {
        //
    }

    public function update(Request $request, Product $product)
    {
        //
    }

    public function destroy(Product $product)
    {
        //
    }
}
