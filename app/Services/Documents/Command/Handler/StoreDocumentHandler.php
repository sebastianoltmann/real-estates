<?php

namespace App\Services\Documents\Command\Handler;


use App\Services\CQRS\Command;
use App\Services\CQRS\CommandHandler;
use App\Services\Documents\Command\StoreDocumentCommand;
use App\Services\Documents\Models\Document;
use App\Services\Documents\Models\DocumentCategory;
use App\Models\User;
use App\Services\Projects\ProjectServiceInterface;
use Illuminate\Support\Facades\Auth;

class StoreDocumentHandler implements CommandHandler
{

    /**
     * @param StoreDocumentCommand $command
     */
    public function handle(Command $command): void
    {
        /**
         * @var Document $document
         */

        $documentCategory = DocumentCategory::findByUuid($command->getCategory());

        $document = Document::create($command->toArray());
        $document->category()->associate($documentCategory)->save();
        $document->project()->associate(Auth::user()->currentProject)->save();
        $document->setFileDocument($command->getFile());

    }
}
