<?php

namespace App\Policies;

use App\Models\Project;
use App\Models\Scope;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ScopePolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user, Project $project): bool
    {
        return in_array($project->id, $user->projects->pluck('id')->toArray());
    }

    public function view(User $user, Scope $scope): bool
    {
        $project_ids = $user->projects->pluck('id')->toArray();
        return in_array($scope->project_id, $project_ids);
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, Scope $scope): bool
    {
        return true;
    }

    public function delete(User $user, Scope $scope): bool
    {
        return true;
    }

    public function restore(User $user, Scope $scope): bool
    {
        return true;
    }

    public function forceDelete(User $user, Scope $scope): bool
    {
        return true;
    }
}
