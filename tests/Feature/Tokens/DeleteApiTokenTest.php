<?php

use App\Models\User;
use Illuminate\Support\Str;
use Laravel\Jetstream\Features;
use function Pest\Laravel\actingAs;
use function Pest\Laravel\delete;

it('api tokens can be deleted', function () {
    actingAs($user = User::factory()->withPersonalTeam()->create());

    $token = $user->tokens()->create([
        'name' => 'Test Token',
        'token' => Str::random(40),
        'abilities' => ['create', 'read'],
    ]);

    delete('/user/api-tokens/' . $token->id);

    expect($user->fresh()->tokens)
        ->toHaveCount(0);
})->skip(fn () => ! Features::hasApiFeatures(), 'API support is not enabled.' );
