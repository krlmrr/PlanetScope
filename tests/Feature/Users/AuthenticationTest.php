<?php

use App\Models\User;
use App\Providers\RouteServiceProvider;

use function Pest\Laravel\assertAuthenticated;
use function Pest\Laravel\get;
use function Pest\Laravel\post;

it('login screen can be rendered', function () {
    expect(route('login'))->toBeUrl('/login');

    get(route('login'))
        ->assertStatus(200);
});

it('users can authenticate using the login screen', function () {
    post('/login', [
        'email' => User::factory()->create()->email,
        'password' => 'password',
    ])->assertRedirect(RouteServiceProvider::HOME);

    assertAuthenticated();
});

it('users can not authenticate with invalid password', function () {
    post('/login', [
        'email' => User::factory()->create()->email,
        'password' => 'wrong-password',
    ]);

    $this->assertGuest();
});
