<?php

namespace App\Services\Documents\Command\Handler;


use App\Services\CQRS\Command;
use App\Services\CQRS\CommandHandler;
use App\Services\Documents\Command\DeleteDocumentCommand;

class DeleteDocumentHandler implements CommandHandler
{

    /**
     * @param DeleteDocumentCommand $command
     */
    public function handle(Command $command): void
    {
        $command->getDocument()->delete();
    }
}
