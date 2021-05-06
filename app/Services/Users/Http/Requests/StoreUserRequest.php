<?php

namespace App\Services\Users\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'projects' => 'required|array',
            'projects.*' => 'uuid|exists:projects,uuid',
            'real_estates' => 'nullable|array',
            'real_estates.*' => 'uuid|exists:real_estates,uuid',
        ];
    }
}
