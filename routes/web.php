<?php

use App\Http\Controllers\IngredientController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'pages.index');

Route::get('/products', [ProductController::class, 'index'])->name('products');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.delete');

Route::post('/products/{product}/recipes', [IngredientController::class, 'store'])->name('product.recipe.store');
Route::get('/products/{product}/recipes/create', [IngredientController::class, 'create'])->name('product.recipe.create');

Route::view('/recipes', 'pages.recipes.index');
Route::view('/ingredients', 'pages.ingredients.index');