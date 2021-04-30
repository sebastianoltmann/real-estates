<?php


namespace App\Services\Permissions;


use MyCLabs\Enum\Enum;

/**
 * Class Roles
 *
 * @method static Roles ADMIN()
 * @method static Roles USER()
 * @package App\Services\Users
 */
final class Roles extends Enum
{
    private const ADMIN = 'admin';
    private const USER = 'user';
}
