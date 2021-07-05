<?php

namespace App\Services\RealEstates\Http\Requests;

use App\Services\RealEstates\RealEstateType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateRealEstateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|min:3|max:255',
            'slug' => 'nullable|string|max:255|unique:real_estates',
            'alias' => 'nullable|string|max:255',
            'type' => ['required','string','max:255', Rule::in(RealEstateType::toArray())],
            'owner' => 'nullable|exists:users,uuid',
        ];
    }
}
