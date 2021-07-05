<?php

namespace App\Services\Users\Query\Handler;


use App\Services\CQRS\Query;
use App\Services\CQRS\QueryHandler;
use App\Services\Permissions\Roles;
use App\Services\Projects\Models\Project;
use App\Services\Projects\ProjectServiceInterface;
use App\Services\RealEstates\Repositories\RealEstateRepository;
use App\Services\Users\Query\EditUserQuery;

class EditUserHandler implements QueryHandler
{

    public function __construct(
        private RealEstateRepository $realEstateRepository
    )
    {
    }

    /**
     * @param EditUserQuery $query
     * @return mixed|void
     */
    public function execute(Query $query)
    {
        return [
            'user' => $query->getUser(),
            'realEstates' => $this->realEstateRepository->getByProject(),
            'projects' => Project::all()
        ];
    }
}
