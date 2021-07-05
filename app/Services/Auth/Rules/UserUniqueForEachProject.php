<?php

namespace App\Services\Auth\Rules;

use App\Models\User;
use App\Services\Projects\Facade\ProjectFacade;
use Illuminate\Contracts\Validation\Rule;

class UserUniqueForEachProject implements Rule
{
    const NO_USERS = 0;
    const ONE_USER = 1;

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {

        $users = User::where($attribute, $value)->get();
        if($users->count() == self::NO_USERS) {
            return true;
        } elseif($users->count() == self::ONE_USER) {
            /**
             * @var User $user
             */
            $user = $users->first();
            $project = ProjectFacade::getProject();

            return !$user->projects()
                ->whereProjectId($project->id)
                ->exists();
        }
        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return __('validation.unique');
    }
}
