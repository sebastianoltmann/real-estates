<?php


namespace App\Services\Projects\Repositories;


use App\Common\Repositories\Eloquent\EloquentRepository;
use App\Services\Projects\Models\Project;
use App\Services\Projects\Models\ProjectDomain;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Schema;

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
        $domainModel = new ProjectDomain();
        if(! Schema::hasTable($domainModel->getTable())) return null;

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
