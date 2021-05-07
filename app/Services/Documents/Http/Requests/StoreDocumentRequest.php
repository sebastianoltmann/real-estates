<?php

namespace App\Services\Documents\Http\Requests;

use App\Services\Permissions\Permission;
use Illuminate\Foundation\Http\FormRequest;

class StoreDocumentRequest extends FormRequest
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
            'file' => 'required|file|mimes:doc,docx,pdf,xls,xlsx|max:'.config('media-library.max_file_size') / 1024,
            'category' => 'required|uuid|exists:document_categories,uuid',
            'published_at' => 'nullable|date'
        ];
    }
}
