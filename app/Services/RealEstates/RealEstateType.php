<?php


namespace App\Services\RealEstates;

use MyCLabs\Enum\Enum;

/**
 * Class RealEstateType
 *
 * @method static RealEstateType APARTMENT()
 * @method static RealEstateType FLAT()
 * @method static RealEstateType HOUSE()
 * @package App\Services\RealEstates
 */
final class RealEstateType extends Enum
{
    private const APARTMENT = 'apartment';
    private const FLAT = 'flat';
    private const HOUSE = 'house';

}
