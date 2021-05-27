<?php

namespace App\Services\Users\Http\Requests;

use App\Services\Users\Attention;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'attention' => ['nullable', Rule::in(Attention::toArray())],
            'first_name' => 'required|string|min:2|max:255',
            'last_name' => 'required|string|min:2|max:255',
            'email' => 'required|email|unique:users,email',
            'projects' => 'required|array',
            'projects.*' => 'uuid|exists:projects,uuid',
            'real_estates' => 'nullable|array',
            'real_estates.*' => 'uuid|exists:real_estates,uuid',
        ];
    }
}
