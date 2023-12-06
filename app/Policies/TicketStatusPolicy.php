<?php

namespace App\Policies;

use App\Models\User;
use App\Models\ticket_statuses;
use Illuminate\Auth\Access\Response;

class TicketStatusPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('List Todo Status');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, ticket_statuses $ticketStatuses): bool
    {
        return $user->can('View Todo Status');
     
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('Create Todo Status');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, ticket_statuses $ticketStatuses): bool
    {
        return $user->can('Update Todo Status');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, ticket_statuses $ticketStatuses): bool
    {
        return $user->can('Delete Todo Status');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, ticket_statuses $ticketStatuses): bool
    {
        return $user->can('Restore Todo Status');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, ticket_statuses $ticketStatuses): bool
    {
        return $user->can('forceDelete Todo Status');
    }
}
