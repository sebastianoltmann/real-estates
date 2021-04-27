<?php

namespace App\Http\Livewire\Documents;

use App\Models\User;
use App\Services\Documents\Models\Document;
use App\Services\Documents\Models\DocumentCategory;
use Livewire\Component;

class TableRowDocument extends Component
{
    public $deleteId = '';

    /**
     * @var Document
     */
    public Document $document;

    /**
     * @var DocumentCategory
     */
    public DocumentCategory $category;

    public $search = false;

    /**
     * @var User
     */
    public User $user;

    public function render()
    {
        return view('livewire.documents.table-row-document');
    }

    /**
     * Write code on Method
     */
    public function delete()
    {
        $this->document->delete();
    }
}
