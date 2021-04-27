<?php

namespace App\Services\Documents\Http\Requests;

use App\Services\Permissions\Permission;
use Illuminate\Foundation\Http\FormRequest;

class UpdateDocumentRequest extends StoreDocumentRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'file' => 'nullable|file|mimes:doc,docx,pdf,xls,xlsx|max:'.config('media-library.max_file_size') / 1024,
        ] + parent::rules();
    }
}
