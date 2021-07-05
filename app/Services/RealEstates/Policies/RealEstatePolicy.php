<?php

namespace App\Services\RealEstates\Policies;

use App\Models\User;
use App\Services\Permissions\Permission;
use App\Services\Permissions\Roles;
use App\Services\RealEstates\Models\RealEstate;
use Illuminate\Auth\Access\HandlesAuthorization;

class RealEstatePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param User $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasProjectPermission(Permission::REAL_ESTATE_READ()->getValue());
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param User       $user
     * @param RealEstate $realEstate
     * @return mixed
     */
    public function view(User $user, RealEstate $realEstate)
    {
        if(!$user->hasProjectPermission(Permission::REAL_ESTATE_READ()->getValue())){
            return false;
        }

        if($user->hasProjectRole(Roles::ADMIN()->getValue())){
            return true;
        }

        if($realEstate->sold &&
            $realEstate->owner->id === $user->id){
            return true;
        } elseif(!$realEstate->sold){
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasProjectPermission(Permission::REAL_ESTATE_CREATE()->getValue());
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User       $user
     * @param RealEstate $realEstate
     * @return mixed
     */
    public function update(User $user, RealEstate $realEstate)
    {
        return $user->hasProjectPermission(Permission::REAL_ESTATE_UPDATE()->getValue());
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User       $user
     * @param RealEstate $realEstate
     * @return mixed
     */
    public function delete(User $user, RealEstate $realEstate)
    {
        return $user->hasProjectPermission(Permission::REAL_ESTATE_DELETE()->getValue());
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param User       $user
     * @param RealEstate $realEstate
     * @return mixed
     */
    public function restore(User $user, RealEstate $realEstate)
    {
        return $user->hasProjectPermission(Permission::REAL_ESTATE_RESTORE()->getValue());
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param User       $user
     * @param RealEstate $realEstate
     * @return mixed
     */
    public function forceDelete(User $user, RealEstate $realEstate)
    {
        return $user->hasProjectPermission(Permission::REAL_ESTATE_DELETE()->getValue());
    }
}
