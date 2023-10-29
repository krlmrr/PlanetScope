<?php

use App\Models\User;
use function Pest\Laravel\actingAs;

beforeEach(function () {
    $this->project = project();
});

it('allows a team owner to view a project', function () {
    $owner = User::where('id', $this->project->team->owner->id)->first();

    $owner->switchTeam($this->project->team);

    actingAs($owner)
        ->get(route('projects.show', $this->project->id))
        ->assertStatus(200);
});

it('allows a team member to view a project', function () {
    actingAs(teamMember($this->project->team))
        ->get(route('projects.show', $this->project->id))
        ->assertStatus(200);
});
