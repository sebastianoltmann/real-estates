<?php

namespace App\Services\RealEstates\Query\Handler;


use App\Services\CQRS\Query;
use App\Services\CQRS\QueryHandler;
use App\Services\RealEstates\Query\AdminIndexRealEstateQuery;
use App\Services\RealEstates\Repositories\RealEstateRepository;

class AdminIndexRealEstateHandler implements QueryHandler
{

    public function __construct(
        private RealEstateRepository $realEstateRepository
    )
    {
    }

    /**
     * @param AdminIndexRealEstateQuery $query
     * @return mixed|void
     */
    public function execute(Query $query)
    {
        return [
            'realEstates' => $this->realEstateRepository
                ->getByProject()
                ->sortBy('user_id'),
        ];
    }
}
