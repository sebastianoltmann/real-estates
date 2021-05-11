<?php

namespace App\Services\RealEstates\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\CQRS\Facades\QueryDispatcherFacade as QueryDispatcher;
use App\Services\RealEstates\Models\RealEstate;
use App\Services\RealEstates\Query\IndexRealEstateQuery;

class RealEstatesController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(RealEstate::class);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(){
        return QueryDispatcher::execute(
            new IndexRealEstateQuery()
        );
    }

    /**
     * @param RealEstate $realEstate
     * @return RealEstate
     */
    public function show(RealEstate $realEstate){
        return $realEstate;
    }
}
