<?php

namespace App\Services\Documents\Policies;

use App\Models\User;
use App\Services\Documents\Models\Document;
use App\Services\Permissions\Permission;
use App\Services\RealEstates\Models\RealEstate;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Http\Request;

class DocumentPolicy
{
    use HandlesAuthorization;

    /**
     * DocumentPolicy constructor.
     *
     * @param Request $request
     */
    public function __construct(
        private Request $request
    )
    {
    }

    /**
     * Determine whether the user can view any models.
     *
     * @param User $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        if($user->isAdmin()) return true;

        return $user->hasProjectPermission(Permission::DOCUMENT_READ()->getValue());
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param User     $user
     * @param Document $document
     * @return mixed
     */
    public function view(User $user, Document $document)
    {
        if(!$user->hasProjectPermission(Permission::DOCUMENT_READ()->getValue()))
            return false;

        if($user->isAdmin()) return true;

        /**
         * @var RealEstate $realEstate
         */
        $realEstate = $this->request->real_estate;

        if($realEstate->sold) {
            if($realEstate->owner->id !== $user->id) return false;
            // TODO: check document category
        }
        return $document->published;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasProjectPermission(Permission::DOCUMENT_CREATE()->getValue());
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User     $user
     * @param Document $document
     * @return mixed
     */
    public function update(User $user, Document $document = null)
    {
        return $user->hasProjectPermission(Permission::DOCUMENT_UPDATE()->getValue());
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User     $user
     * @param Document $document
     * @return mixed
     */
    public function delete(User $user, Document $document)
    {
        return $user->hasProjectPermission(Permission::DOCUMENT_DELETE()->getValue());
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param User     $user
     * @param Document $document
     * @return mixed
     */
    public function restore(User $user, Document $document)
    {
        return $user->hasProjectPermission(Permission::DOCUMENT_RESTORE()->getValue());
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param User     $user
     * @param Document $document
     * @return mixed
     */
    public function forceDelete(User $user, Document $document)
    {
        return $user->hasProjectPermission(Permission::DOCUMENT_DELETE()->getValue());
    }
}
