<?php

namespace App\Services\Trash\Command\Handler;


use App\Services\CQRS\Command;
use App\Services\CQRS\CommandHandler;
use App\Services\Trash\Command\RestoreTrashedModelCommand;

class RestoreTrashedModelHandler implements CommandHandler
{

    /**
     * @param RestoreTrashedModelCommand $command
     */
    public function handle(Command $command): void
    {
        $command->getModel()->restore();
    }
}
