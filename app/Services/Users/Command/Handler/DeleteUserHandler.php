<?php

namespace App\Services\Users\Command\Handler;


use App\Services\CQRS\Command;
use App\Services\CQRS\CommandHandler;
use App\Services\Users\Command\DeleteUserCommand;

class DeleteUserHandler implements CommandHandler
{

    /**
     * @param DeleteUserCommand $command
     */
    public function handle(Command $command): void
    {
        $command->getUser()->delete();
    }
}
