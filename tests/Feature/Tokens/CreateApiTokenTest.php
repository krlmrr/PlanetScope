<?php

use App\Models\User;
use Laravel\Jetstream\Features;
use function Pest\Laravel\actingAs;
use function Pest\Laravel\post;

it('api tokens can be created', function () {
    actingAs($user = User::factory()->withPersonalTeam()->create());

    post('/user/api-tokens', [
        'name' => 'Test Token',
        'permissions' => [
            'read',
            'update',
        ],
    ]);

    expect($user->fresh()->tokens)->toHaveCount(1)
        ->and($user->fresh()->tokens->first()->name)
            ->toEqual('Test Token')
        ->and($user->fresh()->tokens->first()->can('read'))
            ->toBeTrue()
        ->and($user->fresh()->tokens->first()->can('delete'))
            ->toBeFalse();
})->skip(fn () => ! Features::hasApiFeatures(), 'API support is not enabled.');
