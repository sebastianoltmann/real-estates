<?php

namespace App\Services\RealEstates\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\Documents\Models\Document;
use App\Services\RealEstates\Models\RealEstate;
use App\Services\Documents\Events\DocumentHasBeenDownloaded;

class RealEstatesDocumentsController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Document::class);
    }

    /**
     * @param RealEstate $realEstate
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(RealEstate $realEstate = null, Document $document){

        event(new DocumentHasBeenDownloaded($document));
        return response()->file($document->getFileDocument()->getPath());
    }
}
