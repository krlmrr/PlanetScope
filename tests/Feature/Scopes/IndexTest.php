<?php

use App\Models\Scope;
use App\Models\Team;
use App\Models\User;
use Database\Seeders\DatabaseSeeder;

use function Pest\Laravel\actingAs;

beforeEach(function () {
    $this->seed(DatabaseSeeder::class);
    $this->project = project();
    $this->team = Team::where('id', $this->project->team_id)->first();
    $this->owner = User::where('id', $this->project->created_by)->first();

    Scope::factory()->count(5)->create([
        'team_id' => $this->project->team_id,
        'project_id' => $this->project->id,
    ]);
});

it('allows the owner to see a list of scopes on a project', function () {
    $scope = Scope::where('project_id', $this->project->id)
        ->inRandomOrder()
        ->first();

    // Make sure the owner is on the correct team.
    $this->owner->switchTeam($this->team);

    actingAs($this->owner)->get(
        route('projects.scopes.index', $this->project->id)
    )->assertSee($scope->title);
})->skip('Not finished');

it('allows a team member to view a scope of work', function () {
    $team = Team::where('id', $this->project->team_id)->first();
    $teamMember = teamMember($team);

    $scope = Scope::where('project_id', $this->project->id)
        ->inRandomOrder()
        ->first();

    actingAs($teamMember)->get(
        route('projects.scopes.index', $this->project->id)
    )->assertSee($scope->title);
});

it('does not allow non-team members to view the scopes', function () {
    actingAs(user())->get(
        route('projects.scopes.index', $this->project->id)
    )->assertStatus(403);
})->skip('Not finished');
