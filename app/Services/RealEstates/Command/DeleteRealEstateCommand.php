<?php

namespace App\Services\RealEstates\Command;


use App\Services\CQRS\Command;
use App\Services\RealEstates\Models\RealEstate;

class DeleteRealEstateCommand implements Command
{

    /**
     * DeleteRealEstateCommand constructor.
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
