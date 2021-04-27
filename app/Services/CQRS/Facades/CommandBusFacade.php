<?php


namespace App\Services\CQRS\Facades;

use App\Services\CQRS\Command;
use Illuminate\Support\Facades\Facade;

/**
 * @method static void handle(Command $command)
 * @method static void handleWithTransaction(Command $command)
 * @method static void handleMany(array $commands)
 * @method static void handleManyWithTransactions(array $commands)
 *  *
 * @see CommandBus
 */
class CommandBusFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'commandBus';
    }
}
