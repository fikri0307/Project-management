<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Users;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class UsersPolicy
{
    use HandlesAuthorization;
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('List Users')|| $user->hasRole(['project-management', 'admin']);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Users $users): bool
    {
        return $user->can('View Users')|| $user->hasRole(['project-management', 'admin']);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('Create Users')|| $user->hasRole(['project-management', 'admin']);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Users $users): bool
    {
        return $user->can('Update Users')|| $user->hasRole(['project-management', 'admin']);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Users $users): bool
    {
        return $user->can('Delete Users')|| $user->hasRole(['project-management', 'admin']);
    }

    /**
     * Determine whether the user can restore the model.
     */
    // public function restore(User $user, Users $users): bool
    // {
    //     //
    // }

    // /**
    //  * Determine whether the user can permanently delete the model.
    //  */
    // public function forceDelete(User $user, Users $users): bool
    // {
    //     //
    // }
}
