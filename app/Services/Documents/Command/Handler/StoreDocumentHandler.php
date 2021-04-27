<?php

namespace App\Services\Documents\Command\Handler;


use App\Services\CQRS\Command;
use App\Services\CQRS\CommandHandler;
use App\Services\Documents\Command\StoreDocumentCommand;
use App\Services\Documents\Models\Document;
use App\Services\Documents\Models\DocumentCategory;
use App\Models\User;
use App\Services\Projects\ProjectServiceInterface;

class StoreDocumentHandler implements CommandHandler
{

    /**
     * StoreDocumentHandler constructor.
     *
     * @param ProjectServiceInterface $projectService
     */
    public function __construct(
        private ProjectServiceInterface $projectService
    )
    {
    }

    /**
     * @param StoreDocumentCommand $command
     */
    public function handle(Command $command): void
    {
        /**
         * @var Document $document
         */

        $users = User::whereIn('uuid', $command->getUsers())->get('id')->pluck('id');
        $documentCategory = DocumentCategory::findByUuid($command->getCategory());

        $document = Document::create($command->toArray());
        $document->category()->associate($documentCategory)->save();
        $document->project()->associate($this->projectService->getProject())->save();
        $document->users()->sync($users);
        $document->setFileDocument($command->getFile());

    }
}
