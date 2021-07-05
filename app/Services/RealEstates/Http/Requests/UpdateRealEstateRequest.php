<?php

namespace App\Services\RealEstates\Http\Requests;

use App\Services\RealEstates\RealEstateType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRealEstateRequest extends CreateRealEstateRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'slug' => ['nullable','string','max:255', Rule::unique('real_estates')->ignore($this->real_estate)],
        ] + parent::rules();
    }
}
