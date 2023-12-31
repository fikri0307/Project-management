<?php

namespace App\Policies;

use App\Models\Project_statuses;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class ProjectStatusPolicy
{
    use HandlesAuthorization;
    /**
     * Determine whether the user can view any models.
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return $user->can('List Project Status') || $user->hasRole('admin');
    }

    /**
     * Determine whether the user can view the model.
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Project_statuses $projectStatuses)
    {
        return $user->can('View Project Status') || $user->hasRole('admin');
    }

    /**
     * Determine whether the user can create models.
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->can('Create Project Status') || $user->hasRole('admin');
    }

    /**
     * Determine whether the user can update the model.
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Project_statuses $projectStatuses)
    {
        return $user->can('Update Project Status');
    }

    /**
     * Determine whether the user can delete the model.
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Project_statuses $projectStatuses)
    {
        return $user->can('Delete Project Status');
    }

    /**
     * Determine whether the user can restore the model.
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Project_statuses $projectStatuses)
    {
        return $user->can('Restore Project Status');
    }

    /**
     * Determine whether the user can permanently delete the model.
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Project_statuses $projectStatuses)
    {
        return $user->can('forceDelete Project Status');
    }
}
