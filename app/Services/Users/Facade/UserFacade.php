<?php


namespace App\Services\Users\Facade;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Facade;
use App\Services\Users\Repositories\UserRepository;

/**
 * Class UserFacade
 *
 * @package App\Services\Projects\Facade
 * @method static Collection getAdmins()
 * @method static Collection getAllAdmins()
 * @method static Collection getUsers()
 * @see     UserRepository
 */
class UserFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return UserRepository::class;
    }
}
