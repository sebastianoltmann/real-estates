<?php


namespace App\Services\Users;


use MyCLabs\Enum\Enum;

/**
 * Class Attention
 * @method static Attention MR()
 * @method static Attention MRS()
 * @method static Attention MS()
 * @package App\Services\Users
 */
class Attention extends Enum
{
    private const MR = 'mr';
    private const MRS = 'mrs';
    private const MS = 'ms';
}
