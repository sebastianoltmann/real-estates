<?php

namespace App\Services\RealEstates\Command;


use App\Services\RealEstates\Models\RealEstate;

class UpdateRealEstateCommand extends CreateRealEstateCommand
{

    /**
     * UpdateRealEstateCommand constructor.
     *
     * @param array      $params
     * @param RealEstate $realEstate
     */
    public function __construct(
        array $params,
        protected RealEstate $realEstate
    )
    {
        parent::__construct($params);
    }

    /**
     * @return RealEstate
     */
    public function getRealEstate(): RealEstate
    {
        return $this->realEstate;
    }
}
