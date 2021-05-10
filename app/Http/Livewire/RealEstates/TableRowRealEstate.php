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
        return view('admin.real-estates._partials.table-row-real-estate');
    }

    /**
     * Write code on Method
     */
    public function delete()
    {
        $this->realEstate->delete();
    }
}
