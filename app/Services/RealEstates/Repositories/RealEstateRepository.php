<?php


namespace App\Services\RealEstates\Repositories;


use App\Common\Repositories\Eloquent\EloquentRepository;
use App\Services\Projects\Models\Project;
use App\Services\RealEstates\Models\RealEstate;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

class RealEstateRepository extends EloquentRepository
{

    /**
     * @inheritDoc
     */
    public function model(): string
    {
        return RealEstate::class;
    }

    /**
     * @param Project|null $project
     * @return mixed
     */
    public function getByProject(Project $project = null): Collection
    {
        return RealEstate::byProject($project)->get();
    }

    /**
     * @return Collection
     */
    public function getSoldRealEstates(): Collection
    {
        return RealEstate::byProject()->whereHas('owner')->get();
    }

    /**
     * @return Collection
     */
    public function getAvailableRealEstates(): Collection
    {
        return RealEstate::byProject()->doesntHave('owner')->get();

    }
}
