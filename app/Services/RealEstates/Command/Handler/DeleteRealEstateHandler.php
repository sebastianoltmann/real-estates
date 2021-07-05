<?php

namespace App\Services\RealEstates\Command\Handler;


use App\Services\CQRS\Command;
use App\Services\CQRS\CommandHandler;
use App\Services\RealEstates\Command\DeleteRealEstateCommand;

class DeleteRealEstateHandler implements CommandHandler
{

    /**
     * @param DeleteRealEstateCommand $command
     */
    public function handle(Command $command): void
    {
        $command->getRealEstate()->delete();
    }
}
