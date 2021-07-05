<?php


namespace App\Services\Permissions;

use Illuminate\Support\Collection;
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
 * @method static Permission DOCUMENT_RESTORE()
 * @method static Permission USER_CREATE()
 * @method static Permission USER_UPDATE()
 * @method static Permission USER_DELETE()
 * @method static Permission USER_READ()
 * @method static Permission USER_RESTORE()
 * @method static Permission REAL_ESTATE_CREATE()
 * @method static Permission REAL_ESTATE_UPDATE()
 * @method static Permission REAL_ESTATE_DELETE()
 * @method static Permission REAL_ESTATE_READ()
 * @method static Permission REAL_ESTATE_RESTORE()
 * @method static Permission TRASH_READ()
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
    private const DOCUMENT_RESTORE = 'document:restore';

    private const USER_CREATE = 'user:create';
    private const USER_UPDATE = 'user:update';
    private const USER_DELETE = 'user:delete';
    private const USER_READ = 'user:read';
    private const USER_RESTORE = 'user:restore';

    private const REAL_ESTATE_CREATE = 'real_estate:create';
    private const REAL_ESTATE_UPDATE = 'real_estate:update';
    private const REAL_ESTATE_DELETE = 'real_estate:delete';
    private const REAL_ESTATE_READ = 'real_estate:read';
    private const REAL_ESTATE_RESTORE = 'real_estate:restore';

    private const TRASH_READ = 'trash:read';
}
