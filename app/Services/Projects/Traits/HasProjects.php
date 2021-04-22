<?php


namespace App\Services\Projects\Traits;


use App\Services\Projects\Models\Project;
use Illuminate\Support\Str;
use Laravel\Jetstream\Jetstream;
use Laravel\Jetstream\OwnerRole;
use Laravel\Sanctum\HasApiTokens;

trait HasProjects
{
    /**
     * Determine if the given project is the current project.
     *
     * @param  mixed  project
     * @return bool
     */
    public function isCurrentProject($project)
    {
        return $project->id === $this->currentProject->id;
    }

    /**
     * Get the current project of the user's context.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function currentProject()
    {
        if (is_null($this->current_project_id) && $this->id) {
            $this->switchProject($this->personalProject());
        }

        return $this->belongsTo(Jetstream::teamModel(), 'current_project_id');
    }

    /**
     * Switch the user's context to the given project.
     *
     * @param  mixed  $project
     * @return bool
     */
    public function switchProject($project)
    {
        if (! $this->belongsToProject($project)) {
            return false;
        }

        $this->forceFill([
            'current_project_id' => $project->id,
        ])->save();

        $this->setRelation('currentProject', $project);

        return true;
    }

    /**
     * @param mixed $project
     * @return bool
     */
    public function switchTeam($project)
    {
        return $this->switchProject($project);
    }

    /**
     * Get all of the projects the user owns or belongs to.
     *
     * @return \Illuminate\Support\Collection
     */
    public function allProjects()
    {
        return $this->ownedProjects->merge($this->projects)->sortBy('name');
    }

    /**
     * Get all of the projects the user owns.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ownedProjects()
    {
        return $this->hasMany(Jetstream::teamModel());
    }

    /**
     * Get all of the projects the user belongs to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function projects()
    {
        return $this->belongsToMany(Jetstream::teamModel(), Jetstream::membershipModel())
            ->withPivot('role')
            ->withTimestamps()
            ->as('membership');
    }

    /**
     * Get the user's "personal" project.
     *
     * @return Project
     */
    public function personalProject()
    {
        return $this->ownedProjects->where('personal_project', true)->first();
    }

    /**
     * Determine if the user owns the given project.
     *
     * @param  mixed  $project
     * @return bool
     */
    public function ownsProject($project)
    {
        return $this->id == $project->{$this->getForeignKey()};
    }

    /**
     * Determine if the user belongs to the given project.
     *
     * @param  Project  $project
     * @return bool
     */
    public function belongsToProject($project)
    {
        return $this->projects->contains(function ($t) use ($project) {
                return $t->id === $project->id;
            }) || $this->ownsProject($project);
    }

    /**
     * Get the role that the user has on the project.
     *
     * @param  Project  $project
     * @return \Laravel\Jetstream\Role
     */
    public function projectRole($project)
    {
        if ($this->ownsProject($project)) {
            return new OwnerRole;
        }

        if (! $this->belongsToProject($project)) {
            return;
        }

        return Jetstream::findRole($project->users->where(
            'id', $this->id
        )->first()->membership->role);
    }

    /**
     * Determine if the user has the given role on the given project.
     *
     * @param  mixed  $project
     * @param  string  $role
     * @return bool
     */
    public function hasProjectRole($project, string $role)
    {
        if ($this->ownsProject($project)) {
            return true;
        }

        return $this->belongsToProject($project) && optional(Jetstream::findRole($project->users->where(
                'id', $this->id
            )->first()->membership->role))->key === $role;
    }

    /**
     * Get the user's permissions for the given project.
     *
     * @param  mixed  $project
     * @return array
     */
    public function projectPermissions($project)
    {
        if ($this->ownsProject($project)) {
            return ['*'];
        }

        if (! $this->belongsToTeam($project)) {
            return [];
        }

        return $this->projectRole($project)->permissions;
    }

    /**
     * Determine if the user has the given permission on the given project.
     *
     * @param  mixed  $project
     * @param  string  $permission
     * @return bool
     */
    public function hasProjectPermission($project, string $permission)
    {
        if($this->ownsProject($project)) {
            return true;
        }

        if(!$this->belongsToProject($project)) {
            return false;
        }

        if(in_array(HasApiTokens::class, class_uses_recursive($this)) &&
            !$this->tokenCan($permission) &&
            $this->currentAccessToken() !== null) {
            return false;
        }

        $permissions = $this->projectPermissions($project);

        return $this->checkPermissionsIncludesPermission($permissions, $permission);
    }

    /**
     * @param array  $permissions
     * @param string $permission
     * @return bool
     */
    public function checkPermissionsIncludesPermission(array $permissions, string $permission): bool
    {
        return in_array($permission, $permissions) ||
            in_array('*', $permissions) ||
            (Str::endsWith($permission, ':create') && in_array('*:create', $permissions)) ||
            (Str::endsWith($permission, ':update') && in_array('*:update', $permissions));
    }
}
