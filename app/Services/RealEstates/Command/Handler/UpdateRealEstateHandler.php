<?php

namespace App\Services\RealEstates\Command\Handler;


use App\Models\User;
use App\Services\CQRS\Command;
use App\Services\CQRS\CommandHandler;
use App\Services\RealEstates\Command\UpdateRealEstateCommand;

class UpdateRealEstateHandler implements CommandHandler
{

    /**
     * @param UpdateRealEstateCommand $command
     */
    public function handle(Command $command): void
    {
        $command->getRealEstate()->update($command->toArray());

        if($ownedUuid = $command->getOwner()){
            /**
             * @var User $owner
             */
            $owner = User::findByUuid($ownedUuid);
            $command->getRealEstate()->owner()->associate($owner)->save();
        }
    }
}
