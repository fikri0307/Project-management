<?php

namespace App\Policies;

use App\Models\User;
use App\Models\ticket_statuses;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class TicketStatusesPolicy
{
    use HandlesAuthorization;
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('List Ticket Statuses');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, ticket_statuses $ticketStatuses): bool
    {
        return $user->can('View Ticket Statuses');  
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('Create Ticket Statuses');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, ticket_statuses $ticketStatuses): bool
    {
        return $user->can('Update Ticket Statuses');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, ticket_statuses $ticketStatuses): bool
    {
        return $user->can('Delete Ticket Statuses');
    }

    /**
     * Determine whether the user can restore the model.
     */
    // public function restore(User $user, ticket_statuses $ticketStatuses): bool
    // {
    //     //
    // }

    // /**
    //  * Determine whether the user can permanently delete the model.
    //  */
    // public function forceDelete(User $user, ticket_statuses $ticketStatuses): bool
    // {
    //     //
    // }
}
