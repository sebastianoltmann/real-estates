<?php


namespace App\Services\Projects\Repositories;


use App\Common\Repositories\Eloquent\EloquentRepository;
use App\Services\Projects\Models\Project;
use Illuminate\Database\Eloquent\Builder;

class ProjectRepository extends EloquentRepository
{

    /**
     * @inheritDoc
     */
    public function model(): string
    {
        return Project::class;
    }

    /**
     * @param string $domain
     * @return Project|null
     */
    public function findByProjectDomain(string $domain): ?Project
    {
        return Project::whereHas('projectDomains', function(Builder $query) use ($domain) {
            $query->whereDomain($domain);
        })->first();
    }

    /**
     * @param string $domain
     * @return Project|null
     */
    public function findByDomain(string $domain): ?Project
    {
        return $this->findByProjectDomain($domain);
    }
}
