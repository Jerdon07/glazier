<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\RecipeController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'pages.index');

Route::get('/products', [ProductController::class, 'index'])->name('products');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.delete');

Route::post('/products/{product}/recipes', [RecipeController::class, 'store'])->name('product.recipe.store');
Route::get('/products/{product}/recipes/create', [RecipeController::class, 'create'])->name('product.recipe.create');
Route::delete('/products/{product}/recipes/{recipe}', [RecipeController::class, 'destroy'])->name('products.recipes.destroy');

Route::view('/recipes', 'pages.recipes.index');
Route::view('/ingredients', 'pages.ingredients.index');