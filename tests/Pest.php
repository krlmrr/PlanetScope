<?php

use App\Models\Project;
use App\Models\Team;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase;
use Tests\CreatesApplication;

uses(
    TestCase::class,
    CreatesApplication::class,
    RefreshDatabase::class,
)->in('Feature');

function team($owner = null)
{
    return Team::factory()->create([
        'user_id' => $owner ? $owner->id : 100,
    ]);
}

function owner($team = null): User
{
    $user = User::factory()->create([
        'id' => 100,
    ]);

    $user->switchTeam($team ?? team());

    return $user;
}

function teamMember($team): User
{
    $user = User::factory()->create();

    $team->users()->attach(
        $user,
        ['role' => 'editor']
    );

    $user->switchTeam($team);

    return $user;
}

function user(): User
{
    return User::factory()->create([
        'current_team_id' => Team::factory()->create()
    ]);
}

function project()
{
    $owner = owner();
    $team = team($owner);
    $teamMember = teamMember($team);

    $owner->currentTeam = $team->id;
    $teamMember->currentTeam = $team->id;

    return Project::factory()->create([
        'team_id' => $team->id,
        'created_by' => $owner->id,
    ]);
}
