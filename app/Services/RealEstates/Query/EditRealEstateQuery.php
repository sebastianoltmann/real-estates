<?php

namespace App\Services\RealEstates\Query;


use App\Services\CQRS\Query;
use App\Services\RealEstates\Models\RealEstate;

class EditRealEstateQuery implements Query
{

    /**
     * EditRealEstateQuery constructor.
     */
    public function __construct(
        private RealEstate $realEstate
    )
    {
    }

    /**
     * @return RealEstate
     */
    public function getRealEstate(): RealEstate
    {
        return $this->realEstate;
    }
}
