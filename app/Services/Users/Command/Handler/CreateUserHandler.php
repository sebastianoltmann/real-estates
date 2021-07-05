<?php

namespace App\Services\Users\Command\Handler;


use App\Models\User;
use App\Services\CQRS\Command;
use App\Services\CQRS\CommandHandler;
use App\Services\Permissions\Roles;
use App\Services\Projects\Models\Project;
use App\Services\Users\Command\CreateUserCommand;

class CreateUserHandler implements CommandHandler
{

    /**
     * @param CreateUserCommand $command
     */
    public function handle(Command $command): void
    {

        $projects = Project::whereIn('uuid', $command->getProjects())->get('id');

        /**
         * @var User $user
         */
        $user = User::create($command->toArray());
        $user->projects()->attach($projects->pluck('id'), ['role' => Roles::USER()->getValue()]);
        $user->switchProject($projects->first());

    }
}
