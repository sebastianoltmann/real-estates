<?php

namespace App\Services\Trash\Http\Requests;

use Illuminate\Support\Facades\Gate;

class ForceDeleteTrashedModelRequest extends TrashedModelRequest
{
    /**
     * @return bool
     */
    public function authorize()
    {
        return Gate::allows('forceDelete', $this->model());
    }
}
