<?php

namespace App\Services\Documents\Query;


use App\Services\CQRS\Query;
use App\Services\Documents\Models\Document;
use App\Services\RealEstates\Models\RealEstate;

class EditDocumentQuery implements Query
{

    /**
     * EditDocumentQuery constructor.
     *
     * @param Document        $document
     * @param RealEstate|null $realEstate
     */
    public function __construct(
        private Document $document,
        private RealEstate|null $realEstate = null
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

    /**
     * @return RealEstate|null
     */
    public function getRealEstate(): ?RealEstate
    {
        return $this->realEstate;
    }
}
