<?php

namespace App\Services\Trash\Policies;

use App\Models\User;
use App\Services\Permissions\Permission;
use Illuminate\Auth\Access\HandlesAuthorization;

class TrashPolicy
{
    use HandlesAuthorization;

    /**
     * @param User $user
     * @return bool
     */
    public function viewAny(User $user)
    {
        return $user->hasProjectPermission(
            Permission::TRASH_READ()->getValue()
        );
    }
}
