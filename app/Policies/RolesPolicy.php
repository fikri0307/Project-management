<?php

namespace App\Policies;

use App\Models\User;
use App\Models\roles;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class RolesPolicy
{
    use HandlesAuthorization;
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('List Roles') || $user->hasRole(['project-management', 'admin']) ;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, roles $roles): bool
    {
        return $user->can('View Roles') || $user->hasRole(['project-management', 'admin']) ;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('Create Roles') || $user->hasRole(['project-management', 'admin']) ;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, roles $roles): bool
    {
        return $user->can('Update Roles') || $user->hasRole(['project-management', 'admin']) ;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, roles $roles): bool
    {
        return $user->can('Delete Roles') || $user->hasRole(['project-management', 'admin']) ;
    }

    /**
     * Determine whether the user can restore the model.
     */
    // public function restore(User $user, roles $roles): bool
    // {
    //     //
    // }

    // /**
    //  * Determine whether the user can permanently delete the model.
    //  */
    // public function forceDelete(User $user, roles $roles): bool
    // {
    //     //
    // }
}
