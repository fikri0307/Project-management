<?php

namespace App\Policies;

use App\Models\User;
use App\Models\permissions;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class PermissionsPolicy
{
    use HandlesAuthorization;
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('List Permissions');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, permissions $permissions): bool
    {
        return $user->can('View Permissions');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('Create Permissions');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, permissions $permissions): bool
    {
        return $user->can('Update Permissions');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, permissions $permissions): bool
    {
        return $user->can('Delete Permissions');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, permissions $permissions): bool
    {
        return $user->can('Restore Permissions');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, permissions $permissions): bool
    {
        return $user->can('forceDelete Permissions');
    }
}
