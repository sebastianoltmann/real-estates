<?php

namespace App\Services\RealEstates\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\CQRS\Facades\CommandBusFacade as CommandBus;
use App\Services\CQRS\Facades\QueryDispatcherFacade as QueryDispatcher;
use App\Services\Documents\Command\DeleteDocumentCommand;
use App\Services\Documents\Command\StoreDocumentCommand;
use App\Services\Documents\Command\UpdateDocumentCommand;
use App\Services\Documents\Http\Requests\StoreDocumentRequest;
use App\Services\Documents\Http\Requests\UpdateDocumentRequest;
use App\Services\Documents\Models\Document;
use App\Services\Documents\Query\EditDocumentQuery;
use App\Services\RealEstates\Models\RealEstate;
use Illuminate\Support\Facades\Redirect;

class AdminRealEstatesDocumentsController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Document::class);
    }

    /**
     * @param RealEstate $realEstate
     * @param Document   $document
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create(RealEstate $realEstate, Document $document)
    {
        return $this->edit($realEstate, $document);
    }

    /**
     * @param RealEstate $realEstate
     * @param Document   $document
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(RealEstate $realEstate, Document $document)
    {
        return view('real-estates.documents.edit', QueryDispatcher::execute(
            new EditDocumentQuery($document, $realEstate)
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDocumentRequest $request, RealEstate $realEstate)
    {
        try {
            CommandBus::handleWithTransaction(
                new StoreDocumentCommand($request->validated(), $realEstate)
            );
            return Redirect::route('admin.realEstates.edit', ['real_estate' => $realEstate])
                ->withSuccessMsg('Document successfully added.');
        } catch(\Exception $e) {
            return Redirect::back()->withInput()->withDangerMsg($e->getMessage());
        }
    }

    /**
     * @param UpdateDocumentRequest $request
     * @param RealEstate            $realEstate
     * @param Document              $document
     * @return mixed
     */
    public function update(UpdateDocumentRequest $request, RealEstate $realEstate, Document $document)
    {
        try {
            CommandBus::handleWithTransaction(
                new UpdateDocumentCommand($document, $request->validated())
            );
            return Redirect::route('admin.realEstates.edit', ['real_estate' => $realEstate])
                ->withSuccessMsg(__('Document ":name" successfully updated.', ['name' => $document->name]));
        } catch(\Exception $e) {
            return Redirect::back()->withInput()->withDangerMsg($e->getMessage());
        }
    }

    /**
     * @param RealEstate $realEstate
     * @param Document   $document
     * @return mixed
     */
    public function destroy(RealEstate $realEstate, Document $document)
    {
        try {
            CommandBus::handleWithTransaction(new DeleteDocumentCommand($document));
            return Redirect::route('admin.realEstates.edit', ['real_estate' => $realEstate])
                ->withSuccessMsg(__('Document ":name" successfully moved to trush.', ['name' => $document->name]));
        } catch(\Exception $e) {
            return Redirect::back()->withInput()->withDangerMsg($e->getMessage());
        }
    }
}
