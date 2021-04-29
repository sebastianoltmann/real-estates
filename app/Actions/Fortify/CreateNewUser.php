<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Services\Permissions\Roles;
use App\Services\Projects\ProjectServiceInterface;
use FlashMessages\FlashMessageContract;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();

        return DB::transaction(function() use ($input) {
            return tap(User::create([
                'name' => $input['name'],
                'email' => $input['email'],
                'password' => Hash::make(Str::random(8)),
            ]), function(User $user) {

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
