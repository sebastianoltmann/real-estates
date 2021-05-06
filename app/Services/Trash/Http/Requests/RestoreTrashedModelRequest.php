<?php

namespace App\Services\Trash\Http\Requests;

use Illuminate\Support\Facades\Gate;

class RestoreTrashedModelRequest extends TrashedModelRequest
{
    /**
     * @return bool
     */
    public function authorize()
    {
        return Gate::allows('restore', $this->model());
    }
}
