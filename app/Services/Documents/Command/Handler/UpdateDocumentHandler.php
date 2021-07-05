<?php

namespace App\Services\Documents\Command\Handler;


use App\Models\User;
use App\Services\CQRS\Command;
use App\Services\CQRS\CommandHandler;
use App\Services\Documents\Command\UpdateDocumentCommand;
use App\Services\Documents\Models\DocumentCategory;
use Illuminate\Http\UploadedFile;

class UpdateDocumentHandler implements CommandHandler
{

    /**
     * @param UpdateDocumentCommand $command
     */
    public function handle(Command $command): void
    {
        $documentCategory = DocumentCategory::findByUuid($command->getCategory());

        $document = $command->getDocument();

        $document->update($command->toArray());
        $document->category()->associate($documentCategory)->save();

        if($command->getFile() instanceof UploadedFile) {
            $document->setFileDocument($command->getFile());
        }
    }
}
