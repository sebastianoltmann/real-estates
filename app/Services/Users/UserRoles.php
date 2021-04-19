<?php


namespace App\Services\Users;


use MyCLabs\Enum\Enum;

/**
 * Class UserRoles
 *
 * @method static UserRoles SUPER_ADMIN()
 * @method static UserRoles ADMIN()
 * @method static UserRoles USER()
 * @package App\Services\Users
 */
final class UserRoles extends Enum
{
    private const SUPER_ADMIN = 'super_admin';
    private const ADMIN = 'admin';
    private const USER = 'user';
}
