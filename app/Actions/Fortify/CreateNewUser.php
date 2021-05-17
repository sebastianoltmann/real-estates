<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Services\Auth\Rules\UserUniqueForEachProject;
use App\Services\Permissions\Roles;
use App\Services\Projects\ProjectServiceInterface;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;


    public function __construct(
        private ProjectServiceInterface $projectService,
        private StatefulGuard $guard
    )
    {
    }

    /**
     * Create a newly registered user.
     *
     * @param array $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', new UserUniqueForEachProject()],
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();

        return DB::transaction(function() use ($input) {
            return tap(User::updateOrCreate(
                ['email' => $input['email']],  $input
            ), function(User $user) {
                $user->projects()->attach(
                    $this->projectService->getProject(),
                    ['role' => Roles::USER()->getValue()]
                );
                $user->switchProject($this->projectService->getProject());

                $this->guard->login($user);
            });
        });
    }
}
