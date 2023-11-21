<?php

use App\Models\Project;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\assertDatabaseHas;

uses()->group('projects');

it('an owner can create a new project', function () {
    actingAs(owner())
        ->post(route('projects.store'), Project::factory()->make()->toArray())
        ->assertStatus(302);
});

it('a team member can create a new project', function () {
    $team = team();

    $project = Project::factory()->make([
        'team_id' => $team->id,
    ])->toArray();

    actingAs(teamMember($team))
        ->post(route('projects.store'), $project)
        ->assertStatus(302);

    assertDatabaseHas('projects', [
        'name' => $project['name'],
    ]);
});
