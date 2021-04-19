<?php

namespace App\Services\Projects\Policies;

use App\Models\User;
use App\Services\Projects\Models\Project;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProjectPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  User  $user
     * @param  Project  $project
     * @return mixed
     */
    public function view(User $user, Project $project)
    {
        return $user->belongsToProject($project);
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  User  $user
     * @param  Project  $project
     * @return mixed
     */
    public function update(User $user, Project $project)
    {
        return $user->ownsProject($project);
    }

    /**
     * Determine whether the user can add project members.
     *
     * @param  User  $user
     * @param  Project  $project
     * @return mixed
     */
    public function addProjectMember(User $user, Project $project)
    {
        return $user->ownsProject($project);
    }

    /**
     * Determine whether the user can update project member permissions.
     *
     * @param  User  $user
     * @param  Project  $project
     * @return mixed
     */
    public function updateProjectMember(User $user, Project $project)
    {
        return $user->ownsProject($project);
    }

    /**
     * Determine whether the user can remove project members.
     *
     * @param  User  $user
     * @param  Project  $project
     * @return mixed
     */
    public function removeProjectMember(User $user, Project $project)
    {
        return $user->ownsProject($project);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  User  $user
     * @param  Project  $project
     * @return mixed
     */
    public function delete(User $user, Project $project)
    {
        return $user->ownsProject($project);
    }
}
