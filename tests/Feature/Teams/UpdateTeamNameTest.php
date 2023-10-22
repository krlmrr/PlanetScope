<?php

use App\Models\User;
use function Pest\Laravel\actingAs;
use function Pest\Laravel\put;

test('team names can be updated', function () {
    actingAs($user = User::factory()->withPersonalTeam()->create());

    put('/teams/' . $user->currentTeam->id, [
        'name' => 'Test Team',
    ]);

    expect($user->fresh()->ownedTeams)
        ->toHaveCount(1)
        ->and($user->currentTeam->fresh()->name)
            ->toEqual('Test Team');
});
