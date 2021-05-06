<?php

namespace App\Services\Users\Command\Handler;


use App\Services\CQRS\Command;
use App\Services\CQRS\CommandHandler;
use App\Services\Permissions\Roles;
use App\Services\Projects\Models\Project;
use App\Services\RealEstates\Models\RealEstate;
use App\Services\Users\Command\UpdateUserCommand;

class UpdateUserHandler implements CommandHandler
{

    /**
     * @param UpdateUserCommand $command
     */
    public function handle(Command $command): void
    {
        $projectIds = Project::whereIn('uuid', $command->getProjects())->get('id')->pluck('id');

        $command->getUser()->update($command->toArray());
        $command->getUser()->projects()->syncWithPivotValues($projectIds, ['role' => Roles::USER()->getValue()]);

        foreach($command->getUser()->ownRealEstates as $realEstate){
            /**
             * @var RealEstate $realEstate
             */
            if(!in_array($realEstate->getUuidKey(), (array)$command->getRealEstates())){
                $realEstate->owner()->dissociate()->save();
            }
        }

        foreach((array)$command->getRealEstates() as $realEstate) {
            /**
             * @var RealEstate $realEstate
             */
            $realEstate = RealEstate::findByUuid($realEstate);
            $realEstate->owner()->associate($command->getUser())->save();
        }

        Project::flushQueryCache();
    }
}
