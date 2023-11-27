<?php

namespace App\Policies;

use App\Models\User;
use App\Models\project;
use App\Models\Project_statuses;
use Illuminate\Auth\Access\Response;


class ProjectPolicy
{
    /**
     * Determine whether the user can view any models.
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return $user->hasRole(['project-management', 'admin']);
    }

    /**
     * Determine whether the user can view the model.
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, project $project)
    {
        return $user->hasRole(['project-management', 'admin']);
    }

    /**
     * Determine whether the user can create models.
     * @return \Illuminate\Auth\Access\Response|bool
     * @param  \App\Models\Project_statuses
     */
    public function create(User $user)
    {
<<<<<<< HEAD
        return $user->hasRole(['project-management', 'admin']);
=======
<<<<<<< HEAD
        return $user->hasRole(['project-management', 'admin']);
=======
        return $user
            
        ;
>>>>>>> e8fbb3af32346b6f11e13b5d66ebfe1c8b1586d2
>>>>>>> bbe94287769f5741e2c66cbc687538c945cca4e8
    }

    /**
     * Determine whether the user can update the model.
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, project $project)
    {
<<<<<<< HEAD
        return $user->hasRole(['project-management', 'admin']);
=======
<<<<<<< HEAD
        return $user->hasRole(['project-management', 'admin']);
=======
        return $user;
>>>>>>> e8fbb3af32346b6f11e13b5d66ebfe1c8b1586d2
>>>>>>> bbe94287769f5741e2c66cbc687538c945cca4e8
    }

    /**
     * Determine whether the user can delete the model.
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, project $project)
    {
<<<<<<< HEAD
        return $user->hasRole(['project-management', 'admin']);
=======
<<<<<<< HEAD
        return $user->hasRole(['project-management', 'admin']);
=======
        return $user;
>>>>>>> e8fbb3af32346b6f11e13b5d66ebfe1c8b1586d2
>>>>>>> bbe94287769f5741e2c66cbc687538c945cca4e8
    }

    /**
     * Determine whether the user can restore the model.
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, project $project)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, project $project)
    {
        //
    }
}
