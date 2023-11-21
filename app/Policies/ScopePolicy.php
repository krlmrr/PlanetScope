<?php

namespace App\Policies;

use App\Models\Scope;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ScopePolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Scope $scope): bool
    {
        return $user->currentTeam->id === $scope->team_id;
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
