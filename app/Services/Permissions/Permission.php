<?php


namespace App\Services\Permissions;

use MyCLabs\Enum\Enum;

/**
 * Class Permission
 *
 * @method static Permission CREATE()
 * @method static Permission UPDATE()
 * @method static Permission DELETE()
 * @method static Permission READ()
 * @method static Permission DOCUMENT_CREATE()
 * @method static Permission DOCUMENT_UPDATE()
 * @method static Permission DOCUMENT_DELETE()
 * @method static Permission DOCUMENT_READ()
 * @package App\Services\Permissions
 */
final class Permission extends Enum
{
    private const CREATE = 'create';
    private const UPDATE = 'update';
    private const DELETE = 'delete';
    private const READ = 'read';

    private const DOCUMENT_CREATE = 'document:create';
    private const DOCUMENT_UPDATE = 'document:update';
    private const DOCUMENT_DELETE = 'document:delete';
    private const DOCUMENT_READ = 'document:read';
}
