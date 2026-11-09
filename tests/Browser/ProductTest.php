<?php

use App\Models\Product;
use App\Models\User;

it('shows all products', function () {
    
    $this->actingAs($user = User::factory()->create());

    $products = Product::factory()->count(10)->for($user)->create();

    visit('/products')->assertSee($products->first()->name);
});

it ('can create a product', function () {
    $this->actingAs($user = User::factory()->create());

    visit('/products')
        ->assertSee('Add Product');

    visit('/products/create')
        ->fill('name', fake()->word())
        ->fill('description', fake()->sentence())
        ->fill('price', '50')
        ->press('Create Product')
        ->assertPathIs('/products');
});

it('can show a single product', function () {
    $this->actingAs($user = User::factory()->create());

    $product = Product::factory()->for($user)->create();

    visit("/products/{$product->id}")
        ->assertPathIs("/products/{$product->id}")
        ->assertSee($product->name);
});

it('can edit a product', function () {

    $this->actingAs($user = User::factory()->create());

    $product = Product::factory()->for($user)->create();

    visit("/products/{$product->id}")
        ->press('Edit')
        ->assertPathIs("/products/{$product->id}/edit")
        ->fill('name', 'Hello!')
        ->press('Update Product')
        ->assertPathIs("/products/{$product->id}")
        ->assertSee('Hello!');
});