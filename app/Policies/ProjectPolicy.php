<?php

namespace App\Policies;

use App\Models\User;
use App\Models\project;
use App\Models\Project_statuses;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;


class ProjectPolicy
{
    use HandlesAuthorization;
    /**
     * Determine whether the user can view any models.
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return $user->can('List Project');
    }

    /**
     * Determine whether the user can view the model.
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, project $project)
    {
        return $user->can('View Project');
    }

    /**
     * Determine whether the user can create models.
     * @return \Illuminate\Auth\Access\Response|bool
     * @param  \App\Models\Project_statuses
     */
    public function create(User $user)
    {
        return $user->can('Create Project');
    }

    /**
     * Determine whether the user can update the model.
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, project $project)
    {
        return $user->can('Update Project');
    }

    /**
     * Determine whether the user can delete the model.
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, project $project)
    {
        return $user->can('Delete Project');
    }

    // /**
    //  * Determine whether the user can restore the model.
    //  * @return \Illuminate\Auth\Access\Response|bool
    //  */
    // public function restore(User $user, project $project)
    // {
    //     //
    // }

    // /**
    //  * Determine whether the user can permanently delete the model.
    //  * @return \Illuminate\Auth\Access\Response|bool
    //  */
    // public function forceDelete(User $user, project $project)
    // {
    //     //
    // }
}
