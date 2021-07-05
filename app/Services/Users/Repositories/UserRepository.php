<?php


namespace App\Services\Users\Repositories;

use App\Common\Repositories\Eloquent\EloquentRepository;
use App\Models\User;
use App\Services\Permissions\Roles;
use App\Services\Projects\Models\Project;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

class UserRepository extends EloquentRepository
{

    /**
     * @return string
     */
    public function model(): string
    {
        return User::class;
    }

    /**
     * @param Project|null $project
     * @return Collection
     */
    public function getAdmins(Project $project = null): Collection
    {
        return User::byProject($project)->whereHas('projects', function(Builder $query) {
            $query->whereRole(Roles::ADMIN()->getValue());
        })->get();
    }

    /**
     * @return Collection
     */
    public function getAllAdmins(): Collection
    {
        return User::whereHas('projects', function(Builder $query) {
            $query->whereRole(Roles::ADMIN()->getValue());
        })->get();
    }

    /**
     * @param Project|null $project
     * @return Collection
     */
    public function getUsers(Project $project = null): Collection
    {
        return User::byProject($project)->whereHas('projects', function(Builder $query) {
            $query->whereRole(Roles::USER()->getValue());
        })->get();
    }
}
