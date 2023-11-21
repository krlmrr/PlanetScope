<?php

use App\Models\User;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\delete;

it('team members can be removed from teams', function () {
    actingAs($user = User::factory()->withPersonalTeam()->create());

    $user->currentTeam->users()->attach(
        $otherUser = User::factory()->create(), ['role' => 'admin']
    );

    delete('/teams/' . $user->currentTeam->id . '/members/' . $otherUser->id);

    expect($user->currentTeam->fresh()->users)
        ->toHaveCount(0);
});

test('only team owner can remove team members', function () {
    $user = User::factory()->withPersonalTeam()->create();

    $user->currentTeam->users()->attach(
        $otherUser = User::factory()->create(), ['role' => 'admin']
    );

    actingAs($otherUser);

    delete('/teams/' . $user->currentTeam->id . '/members/' . $user->id)
        ->assertStatus(403);
});
