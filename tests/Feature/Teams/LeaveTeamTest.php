<?php

use App\Models\User;
use function Pest\Laravel\actingAs;
use function Pest\Laravel\delete;

test('users can leave teams', function () {
    $user = User::factory()->withPersonalTeam()->create();

    $user->currentTeam->users()->attach(
        $otherUser = User::factory()->create(), ['role' => 'admin']
    );

    actingAs($otherUser);

    delete('/teams/' . $user->currentTeam->id . '/members/' . $otherUser->id);

    expect($user->currentTeam->fresh()->users)->toHaveCount(0);
});

test('team owners cant leave their own team', function () {
    actingAs($user = User::factory()->withPersonalTeam()->create());

    delete('/teams/' . $user->currentTeam->id . '/members/' . $user->id)
        ->assertSessionHasErrorsIn('removeTeamMember', ['team']);

    expect($user->currentTeam->fresh())
        ->not->toBeNull();
});
