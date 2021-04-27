<?php

namespace App\Services\Documents\Command;


use App\Services\CQRS\Command;
use App\Services\Documents\Models\Document;

class UpdateDocumentCommand extends StoreDocumentCommand
{

    /**
     * UpdateDocumentCommand constructor.
     */
    public function __construct(
        protected Document $document,
        array $params
    )
    {
        parent::__construct($params);
    }

    /**
     * @return Document
     */
    public function getDocument(): Document
    {
        return $this->document;
    }
}
