<?php

namespace App\Policies;

use App\Models\Project;
use App\Models\Scope;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ScopePolicy
{
    public function viewAny(User $user, Project $project): Response
    {
        return $user->currentTeam->id === $project->team_id
            ? Response::allow()
            : Response::deny('You are not a member of this project\'s team.');
    }

    public function view(User $user, Scope $scope, Project $project): Response
    {
        return $user->currentTeam->id === $project->team_id
            ? Response::allow()
            : Response::deny('You are not a member of this project\'s team.');
    }

    public function create(User $user, Project $project): Response
    {
        return $user->currentTeam->id === $project->team_id
            ? Response::allow()
            : Response::deny('You are not a member of this project\'s team.');
    }

    public function update(User $user, Scope $scope, Project $project): Response
    {
        return $user->currentTeam->id === $project->team_id
            ? Response::allow()
            : Response::deny('You are not a member of this project\'s team.');
    }

    public function delete(User $user, Scope $scope, Project $project): Response
    {
        return $user->currentTeam->id === $project->team_id
            ? Response::allow()
            : Response::deny('You are not a member of this project\'s team.');
    }

    public function restore(User $user, Scope $scope, Project $project): Response
    {
        return $user->currentTeam->id === $project->team_id
            ? Response::allow()
            : Response::deny('You are not a member of this project\'s team.');
    }

    public function forceDelete(User $user, Scope $scope, Project $project): Response
    {
        return $user->currentTeam->id === $project->team_id
            ? Response::allow()
            : Response::deny('You are not a member of this project\'s team.');
    }
}
