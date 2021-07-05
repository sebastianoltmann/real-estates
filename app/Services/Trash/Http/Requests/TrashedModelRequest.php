<?php

namespace App\Services\Trash\Http\Requests;

use App\Services\Trash\TrashModelBindings;
use BaconQrCode\Common\Mode;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

abstract class TrashedModelRequest extends FormRequest
{
    /**
     * @var Model|null
     */
    protected $modelObject;

        /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [];
    }

    /**
     * @return Model|null
     */
    public function model(): ?Model
    {
        if(!empty($this->modelObject))
            return $this->modelObject;

        $modelObject = TrashModelBindings::resourceModel($this->resource);
        if(empty($modelObject))
            return null;

        $modelObject = $modelObject
            ->onlyTrashed()
            ->where($modelObject->getRouteKeyName(), $this->model)
            ->first();

        return $this->modelObject = $modelObject;
    }
}
