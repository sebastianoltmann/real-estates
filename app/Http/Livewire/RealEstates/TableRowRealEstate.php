<?php

namespace App\Http\Livewire\RealEstates;

use App\Services\RealEstates\Models\RealEstate;
use Livewire\Component;

class TableRowRealEstate extends Component
{

    /**
     * @var RealEstate
     */
    public RealEstate $realEstate;

    public function render()
    {
        return view('livewire.real-estates.table-row-real-estate');
    }
}
