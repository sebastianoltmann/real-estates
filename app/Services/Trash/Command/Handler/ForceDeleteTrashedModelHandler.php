<?php

namespace App\Services\Trash\Command\Handler;


use App\Services\CQRS\Command;
use App\Services\CQRS\CommandHandler;
use App\Services\Trash\Command\ForceDeleteTrashedModelCommand;

class ForceDeleteTrashedModelHandler implements CommandHandler
{

    /**
     * @param ForceDeleteTrashedModelCommand $command
     */
    public function handle(Command $command): void
    {
        $command->getModel()->forceDelete();
    }
}
