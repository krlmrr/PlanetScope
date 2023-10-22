<?php

use App\Models\User;
use function Pest\Laravel\actingAs;
use function Pest\Laravel\post;

uses()->group('teams');

it('teams can be created', function () {
    actingAs($user = User::factory()->withPersonalTeam()->create());

    post('/teams', [
        'name' => 'Test Team',
    ]);

    expect($user->fresh()->ownedTeams)
        ->toHaveCount(2)
        ->and($user->fresh()->ownedTeams()->latest('id')->first()->name)
            ->toEqual('Test Team');
});
