<?php

use App\Http\Controllers\Auth\RegistrationController;
use App\Http\Controllers\Auth\SessionController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RecipeController;
use App\Models\Ingredient;
use App\Models\Product;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::view('/', 'pages.index')->name('home');

Route::get('/dashboard', function (): View {
    return view('pages.dashboard', [
        'users_count' => User::count(),
        'products_count' => Product::count(),
        'ingredients_count' => Ingredient::count(),
        'latest_products' => Product::latest()->take(5)->get(),
    ]);
})->middleware('auth');

/* Registration Routes */
Route::middleware('guest')->name('register.')->group(function () {
    Route::get('/register', [RegistrationController::class, 'create'])->name('create');
    Route::post('/register', [RegistrationController::class, 'store'])->name('store');
});

/* Session Routes */
Route::middleware('guest')->name('sessions.')->group(function () {
    Route::get('/login', [SessionController::class, 'create'])->name('create');
    Route::post('/login', [SessionController::class, 'store'])->name('store');
});
Route::delete('/logout', [SessionController::class, 'destroy'])->middleware('auth')->name('sessions.destroy');

/* Ingredient Routes */
Route::middleware('auth', 'admin')->prefix('ingredients')->name('ingredients.')->group(function () {
    Route::get('/', [IngredientController::class, 'index'])->name('index');
    Route::post('/', [IngredientController::class, 'store'])->name('store');
    Route::get('/create', [IngredientController::class, 'create'])->name('create');
    Route::get('/{ingredient}/edit', [IngredientController::class, 'edit'])->name('edit');
    Route::put('/{ingredient}', [IngredientController::class, 'update'])->name('update');
    Route::delete('/{ingredient}', [IngredientController::class, 'destroy'])->name('destroy');
});

/* Product Routes */
Route::middleware('auth')->prefix('products')->name('products.')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('index');
    Route::post('/', [ProductController::class, 'store'])->name('store');
    Route::get('/create', [ProductController::class, 'create'])->name('create');
    Route::get('/{product}', [ProductController::class, 'show'])->name('show');
    Route::get('/{product}/edit', [ProductController::class, 'edit'])->name('edit');
    Route::put('/{product}', [ProductController::class, 'update'])->name('update');
    Route::delete('/{product}', [ProductController::class, 'destroy'])->name('destroy');

    Route::prefix('{product}/recipes')->name('recipes.')->group(function () {
        /* Recipe Routes */
        Route::post('/', [RecipeController::class, 'store'])->name('store');
        Route::get('/create', [RecipeController::class, 'create'])->name('create');
        Route::get('/{recipe}/edit', [RecipeController::class, 'edit'])->name('edit');
        Route::put('/{recipe}', [RecipeController::class, 'update'])->name('update');
        Route::delete('/{recipe}', [RecipeController::class, 'destroy'])->name('destroy');
    });
});

Route::patch('/notifications/{notification}/read', [NotificationController::class, 'read'])->name('notifications.update');
Route::put('/notifications/read-all', [NotificationController::class, 'readAll'])->name('notifications.read-all');
Route::delete('/notifications/{notification}', [NotificationController::class, 'destroy'])->name('notifications.destroy');