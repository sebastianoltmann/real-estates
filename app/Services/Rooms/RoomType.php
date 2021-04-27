<?php


namespace App\Services\Rooms;


use MyCLabs\Enum\Enum;

/**
 * Class RoomType
 *
 * @method static RoomType ATTIC()
 * @method static RoomType BOX_ROOM()
 * @method static RoomType CELLAR()
 * @method static RoomType DINING_ROOM()
 * @method static RoomType DRAWING_ROOM()
 * @method static RoomType GAMES_ROOM()
 * @method static RoomType PARLOUR()
 * @method static RoomType LIVING_ROOM()
 * @method static RoomType GUEST_ROOM()
 * @method static RoomType TOILET()
 * @method static RoomType UTILITY_ROOM()
 * @package App\Services\Rooms
 */
final class RoomType extends Enum
{
    private const ATTIC = 'attic';
    private const BOX_ROOM = 'box_room';
    private const CELLAR = 'cellar';
    private const DINING_ROOM = 'dining_room';
    private const DRAWING_ROOM = 'drawing_room';
    private const GAMES_ROOM = 'games_room';
    private const PARLOUR = 'parlour';
    private const LIVING_ROOM = 'living_room';
    private const GUEST_ROOM = 'guest_room';
    private const TOILET = 'toilet';
    private const UTILITY_ROOM = 'utility_room';
}
