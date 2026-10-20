<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'pages.index');
Route::view('/products', 'pages.products.index');
Route::view('/recipes', 'pages.recipes.index');
Route::view('/ingredients', 'pages.ingredients.index');