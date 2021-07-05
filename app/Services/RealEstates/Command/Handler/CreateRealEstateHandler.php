<?php

namespace App\Services\RealEstates\Command\Handler;


use App\Models\User;
use App\Services\CQRS\Command;
use App\Services\CQRS\CommandHandler;
use App\Services\RealEstates\Command\CreateRealEstateCommand;
use App\Services\RealEstates\Models\RealEstate;

class CreateRealEstateHandler implements CommandHandler
{

    /**
     * @param CreateRealEstateCommand $command
     */
    public function handle(Command $command): void
    {
        /**
         * @var RealEstate $realEstate
         */
        $realEstate = RealEstate::create($command->toArray());
        $realEstate->project()->associate(\Auth::user()->currentProject)->save();

        if($ownedUuid = $command->getOwner()){
            /**
             * @var User $owner
             */
            $owner = User::findByUuid($ownedUuid);
            $realEstate->owner()->associate($owner)->save();
        }
    }
}
