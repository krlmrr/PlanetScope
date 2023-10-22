<?php

use App\Models\Project;
use function Pest\Laravel\actingAs;

uses()->group('projects');

it('an owner can create a new project', function () {
    actingAs(owner())
        ->post(route('projects.store'), Project::factory()->make()->toArray())
        ->assertStatus(302);
});

it('a team member can create a new project', function () {
    actingAs(teamMember())
        ->post(route('projects.store'), Project::factory()->make()->toArray())
        ->assertStatus(302);
});
