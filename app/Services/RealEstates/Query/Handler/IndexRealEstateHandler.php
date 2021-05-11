<?php

namespace App\Services\RealEstates\Query\Handler;


use App\Services\CQRS\Query;
use App\Services\CQRS\QueryHandler;
use App\Services\RealEstates\Exceptions\OneRealEstateAvailableException;
use App\Services\RealEstates\Models\RealEstate;
use App\Services\Users\Exceptions\AuthorizeSignatureExpiredException;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Redirect;

class IndexRealEstateHandler implements QueryHandler
{

    /**
     * @param Query $query
     * @return mixed|void
     */
    public function execute(Query $query)
    {
        $realEstates = RealEstate::paginate();
        if($realEstates->count() === 1){
            throw App::make(OneRealEstateAvailableException::class)
                ->redirectTo('realEstates.show')
                ->withParams(['real_estate' => $realEstates->first()]);
        }
        return compact('realEstates');
    }
}
