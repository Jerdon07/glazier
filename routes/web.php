<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'pages.index');

Route::get('/products', [ProductController::class, 'index'])->name('products');

Route::view('/recipes', 'pages.recipes.index');
Route::view('/ingredients', 'pages.ingredients.index');