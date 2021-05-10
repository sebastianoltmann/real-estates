<?php

namespace App\Http\Livewire\Documents;

use App\Services\Documents\Models\Document;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class PublishedColumn extends Component
{
    /**
     * @var Document
     */
    public Document $document;

    public function render()
    {
        return view('admin.documents._partials.published-column');
    }

    public function togglePublished()
    {
        $this->document->update([
            'published_at' => !$this->document->published ? now() : null
        ]);
    }
}
