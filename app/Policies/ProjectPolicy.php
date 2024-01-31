<?php

namespace App\Policies;

use App\Models\Project;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class ProjectPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): Response
    {
        return $user->belongsToTeam($user->currentTeam)
            ? Response::allow()
            : Response::deny('You must belong to a team to view its projects.');
    }

    public function view(User $user, Project $project): Response
    {
        return $user->currentTeam->id === $project->team_id
            ? Response::allow()
            : Response::deny('You must belong to a team to view its projects.');
    }

    public function create(User $user): Response
    {
        return Response::allow();
    }

    public function update(User $user, Project $project): bool
    {
        return $user->currentTeam->id === $project->team_id;
    }

    public function delete(User $user, Project $project): bool
    {
        return $user->currentTeam->id === $project->team_id;
    }

    public function restore(User $user, Project $project): bool
    {
        return $user->currentTeam->id === $project->team_id;
    }

    public function forceDelete(User $user, Project $project): bool
    {
        return $user->currentTeam->id === $project->team_id;
    }
}
