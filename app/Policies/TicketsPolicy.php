<?php

namespace App\Policies;

use App\Models\User;
use App\Models\tickets;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class TicketsPolicy
{
    use HandlesAuthorization;
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('List Tickets')|| $user->hasRole(['project-management', 'admin']);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, tickets $tickets): bool
    {
        return $user->can('View Tickets')|| $user->hasRole(['project-management', 'admin']);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('Create Tickets')|| $user->hasRole(['project-management', 'admin']);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, tickets $tickets): bool
    {
        return $user->can('Update Tickets')|| $user->hasRole(['project-management', 'admin']);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, tickets $tickets): bool
    {
        return $user->can('Delete Tickets')|| $user->hasRole(['project-management', 'admin']);
    }

    /**
     * Determine whether the user can restore the model.
     */
    // public function restore(User $user, tickets $tickets): bool
    // {
    //     //
    // }

    // /**
    //  * Determine whether the user can permanently delete the model.
    //  */
    // public function forceDelete(User $user, tickets $tickets): bool
    // {
    //     //
    // }
}
