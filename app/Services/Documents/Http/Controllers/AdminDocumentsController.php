<?php

namespace App\Services\Documents\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Services\CQRS\Facades\CommandBusFacade as CommandBus;
use App\Services\CQRS\Facades\QueryDispatcherFacade as QueryDispatcher;
use App\Services\Documents\Command\DeleteDocumentCommand;
use App\Services\Documents\Command\StoreDocumentCommand;
use App\Services\Documents\Command\UpdateDocumentCommand;
use App\Services\Documents\Events\DocumentHasBeenDownloaded;
use App\Services\Documents\Http\Requests\StoreDocumentRequest;
use App\Services\Documents\Http\Requests\UpdateDocumentRequest;
use App\Services\Documents\Models\Document;
use App\Services\Documents\Query\EditDocumentQuery;
use App\Services\Documents\Query\IndexDocumentQuery;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AdminDocumentsController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Document::class);
    }


    public function index()
    {
        return view('documents.index', QueryDispatcher::execute(new IndexDocumentQuery(Auth::user())));
    }

    /**
     * @param Document $document
     */
    public function create(Document $document)
    {
        return $this->edit($document);
    }

    /**
     * @param Document $document
     */
    public function edit(Document $document)
    {
        return view('documents.edit', QueryDispatcher::execute(new EditDocumentQuery($document)));
    }

    /**
     * @param StoreDocumentRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreDocumentRequest $request)
    {
        try {
            CommandBus::handleWithTransaction(new StoreDocumentCommand($request->validated()));
            return Redirect::route('admin.documents.index')
                ->withSuccessMsg(__('Document successfully created.'));
        } catch(\Exception $e) {
            return Redirect::back()->withInput()->withDangerMsg($e->getMessage());
        }
    }

    public function update(UpdateDocumentRequest $request, Document $document)
    {
        try {
            CommandBus::handleWithTransaction(new UpdateDocumentCommand($document, $request->validated()));
            return Redirect::route('admin.documents.index')
                ->withSuccessMsg(__('Document ":name" successfully updated.', ['name' => $document->name]));
        } catch(\Exception $e) {
            return Redirect::back()->withInput()->withDangerMsg($e->getMessage());
        }
    }

    /**
     * @param Document $document
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function show(Document $document)
    {
        event(new DocumentHasBeenDownloaded($document));
        return response()->file($document->getFileDocument()->getPath());
    }

    public function destroy(Document $document)
    {
        try {
            CommandBus::handleWithTransaction(new DeleteDocumentCommand($document));
            return Redirect::route('admin.documents.index')
                ->withSuccessMsg(__('Document ":name" successfully moved to trush.',['name' => $document->name]));
        } catch(\Exception $e) {
            return Redirect::back()->withInput()->withDangerMsg($e->getMessage());
        }
    }
}
