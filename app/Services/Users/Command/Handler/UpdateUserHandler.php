<?php

namespace App\Services\Users\Command\Handler;


use App\Services\CQRS\Command;
use App\Services\CQRS\CommandHandler;
use App\Services\Permissions\Roles;
use App\Services\Projects\Models\Project;
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

        Project::flushQueryCache();
    }
}
