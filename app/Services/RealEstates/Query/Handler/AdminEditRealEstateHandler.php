<?php

namespace App\Services\RealEstates\Query\Handler;


use App\Services\CQRS\Query;
use App\Services\CQRS\QueryHandler;
use App\Services\Documents\Models\DocumentCategory;
use App\Services\RealEstates\Query\AdminEditRealEstateQuery;
use App\Services\Users\Repositories\UserRepository;

class AdminEditRealEstateHandler implements QueryHandler
{
    public function __construct(
        private UserRepository $userRepository
    )
    {
    }

    /**
     * @param AdminEditRealEstateQuery $query
     * @return mixed|void
     */
    public function execute(Query $query)
    {
        return [
            'realEstate' => $query->getRealEstate(),
            'users' => $this->userRepository->getUsers(),
            'documentCategories' => DocumentCategory::all(),
        ];
    }
}
