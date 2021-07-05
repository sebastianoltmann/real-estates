<?php


namespace App\Services\CQRS\Facades;

use App\Services\CQRS\Query;
use Illuminate\Support\Facades\Facade;

/**
 * @method static mixed execute(Query $query)
 *
 * @see QueryDispatcher
 */
class QueryDispatcherFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'queryDispatcher';
    }
}
