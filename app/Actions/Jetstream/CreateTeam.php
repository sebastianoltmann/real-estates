<?php

namespace App\Actions\Jetstream;

use App\Models\User;
use App\Services\Permissions\Roles;
use App\Services\Projects\Models\Project;
use App\Services\Users\Facade\UserFacade;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;
use Laravel\Jetstream\Contracts\CreatesTeams;
use Laravel\Jetstream\Events\AddingTeam;
use Laravel\Jetstream\Jetstream;

class CreateTeam implements CreatesTeams
{
    /**
     * Validate and create a new team for the given user.
     *
     * @param  User  $user
     * @param  array  $input
     * @return mixed
     */
    public function create($user, array $input)
    {
        Gate::forUser($user)->authorize('create', Jetstream::newTeamModel());

        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'alias' => ['required', 'string', 'alpha', 'max:255', 'min:2', 'unique:projects,alias'],
        ])->validateWithBag('createTeam');

        AddingTeam::dispatch($user);

        /**
         * @var Project $project
         */
        $user->switchProject($project = $user->ownedTeams()->create([
            'name' => $input['name'],
            'alias' => $input['alias'],
        ]));

        $project->users()->attach(
            UserFacade::getAllAdmins()->pluck('id')->toArray(),
            ['role' => Roles::ADMIN()->getValue()]
        );

        return $project;
    }
}
