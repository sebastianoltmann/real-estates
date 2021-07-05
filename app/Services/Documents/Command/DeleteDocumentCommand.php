<?php

namespace App\Services\Documents\Command;


use App\Services\CQRS\Command;
use App\Services\Documents\Models\Document;

class DeleteDocumentCommand implements Command
{

    /**
     * DeleteDocumentCommand constructor.
     *
     * @param Document $document
     */
    public function __construct(
        private Document $document
    )
    {
    }

    /**
     * @return Document
     */
    public function getDocument(): Document
    {
        return $this->document;
    }
}
