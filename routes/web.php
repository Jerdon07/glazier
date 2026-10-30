<?php

use App\Http\Controllers\IngredientController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RecipeController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'pages.index');

/* Product Routes */
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

/* Recipe Routes */
Route::post('/products/{product}/recipes', [RecipeController::class, 'store'])->name('products.recipe.store');
Route::get('/products/{product}/recipes/create', [RecipeController::class, 'create'])->name('products.recipe.create');
Route::get('/products/{product}/recipes/{recipe}/edit', [RecipeController::class, 'edit'])->name('products.recips.edit');
Route::put('/products/{product}/recipes/{recipe}', [RecipeController::class, 'update'])->name('rproducts.recipes.update');
Route::delete('/products/{product}/recipes/{recipe}', [RecipeController::class, 'destroy'])->name('products.recipes.destroy');

/* Ingredient Routes */
Route::get('/ingredients', [IngredientController::class, 'index'])->name('ingredients.index');
Route::post('/ingredients', [IngredientController::class, 'store'])->name('ingredients.store');
Route::get('/ingredients/create', [IngredientController::class, 'create'])->name('ingredients.create');
Route::get('/ingredients/{ingredient}/edit', [IngredientController::class, 'edit'])->name('ingredients.edit');
Route::put('/ingredients/{ingredient}', [IngredientController::class, 'update'])->name('ingredients.update');
Route::delete('/ingredients/{ingredient}', [IngredientController::class, 'destroy'])->name('ingredients.destroy');