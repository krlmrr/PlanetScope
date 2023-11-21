<?php

use function Pest\Laravel\actingAs;

uses()->group('projects');

it('loads a project index for the owner', function () {
    actingAs(owner())
        ->get(route('projects.index'))->assertStatus(200);
});

it('allows a team member to see the projects', function () {
    actingAs(teamMember(team()))
        ->get(route('projects.index'))->assertStatus(200);
});

it('does not allow a non-team member to view the project', function () {
    actingAs(user())
        ->get(route('projects.index'))->assertStatus(403);
});
