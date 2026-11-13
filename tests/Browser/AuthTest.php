<?php

use App\Models\User;

test('registers a user', function () {
    visit('/register')
        ->fill('name', 'John Doe')
        ->fill('email', 'john@example.com')
        ->fill('password', 'password')
        ->press('@register-button')
        ->assertPathIs('/');

    expect(User::where('email', 'john@example.com')->exists())->toBe(true);
    $this->assertAuthenticated();
});

test('fail an invalid input', function () {
    visit('/register')
        ->press('@register-button')
        ->assertPathIs('/register')
        ->assertSee('required');
});
