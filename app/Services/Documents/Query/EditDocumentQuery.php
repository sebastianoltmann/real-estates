<?php

namespace App\Services\Documents\Query;


use App\Services\CQRS\Query;
use App\Services\Documents\Models\Document;

class EditDocumentQuery implements Query
{

    /**
     * EditDocumentQuery constructor.
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
