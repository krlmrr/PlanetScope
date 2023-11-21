<?php

namespace App\Policies;

use App\Models\Project;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProjectPolicy
{
    use HandlesAuthorization;

    public function before(User $user): bool|null
    {
        if ($user->ownsTeam($user->currentTeam)) {
            return true;
        }

        return null;
    }

    public function viewAny(User $user): bool
    {
        return $user->belongsToTeam($user->currentTeam);
    }

    public function view(User $user, Project $project): bool
    {
        return $user->currentTeam->id === $project->team_id;
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, Project $project): bool
    {
        return true;
    }

    public function delete(User $user, Project $project): bool
    {
        return true;
    }

    public function restore(User $user, Project $project): bool
    {
        return true;
    }

    public function forceDelete(User $user, Project $project): bool
    {
        return true;
    }
}
