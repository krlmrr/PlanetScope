<?php

use App\Models\User;
use Illuminate\Support\Str;
use Laravel\Jetstream\Features;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\put;

it('api token permissions can be updated', function () {
    actingAs($user = User::factory()->withPersonalTeam()->create());

    $token = $user->tokens()->create([
        'name' => 'Test Token',
        'token' => Str::random(40),
        'abilities' => ['create', 'read'],
    ]);

    put('/user/api-tokens/' . $token->id, [
        'name' => $token->name,
        'permissions' => [
            'delete',
            'missing-permission',
        ],
    ]);

    expect($user->fresh()->tokens->first()->can('delete'))
        ->toBeTrue()
        ->and($user->fresh()->tokens->first()->can('read'))
        ->toBeFalse()
        ->and($user->fresh()->tokens->first()->can('missing-permission'))
        ->toBeFalse();
})->skip(fn () => ! Features::hasApiFeatures(), 'API support is not enabled.');
