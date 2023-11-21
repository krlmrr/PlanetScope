<?php

use App\Models\Team;
use App\Models\User;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\delete;

uses()->group('teams');

it('teams can be deleted', function () {
    $this->actingAs($user = owner());

    $user->ownedTeams()->save($team = Team::factory()->make([
        'personal_team' => false,
    ]));

    $team->users()->attach(
        $otherUser = User::factory()->create(), ['role' => 'test-role']
    );

    delete('/teams/' . $team->id);

    expect($team->fresh())->toBeNull()
        ->and($otherUser->fresh()->teams)
        ->toHaveCount(0);
});

it('personal teams cant be deleted', function () {
    actingAs($user = User::factory()->withPersonalTeam()->create());

    delete('/teams/' . $user->currentTeam->id);

    expect($user->currentTeam->fresh())
        ->not
        ->toBeNull();
});
