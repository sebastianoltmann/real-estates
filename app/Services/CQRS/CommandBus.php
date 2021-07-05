<?php


namespace App\Services\CQRS;


use App\Services\CQRS\Exceptions\CommandHandlerNotFoundException;
use Illuminate\Support\Facades\DB;

class CommandBus
{
    /**
     * @var HandlerResolverInterface
     */
    private $handlerResolver;

    /**
     * CommandBus constructor.
     * @param HandlerResolverInterface $handlerResolver
     */
    public function __construct(HandlerResolverInterface $handlerResolver)
    {
        $this->handlerResolver = $handlerResolver;
    }

    /**
     * @param Command $command
     * @throws CommandHandlerNotFoundException
     */
    public function handle(Command $command): void
    {
        $handler = $this->handlerResolver->handler($command);

        if (!$handler || !($handler instanceof CommandHandler)) {
            throw new CommandHandlerNotFoundException(get_class($command));
        }

        $handler->handle($command);
    }

    /**
     * @param Command $command
     * @throws CommandHandlerNotFoundException
     */
    public function handleWithTransaction(Command $command): void
    {
        try {
            DB::beginTransaction();
            $this->handle($command);
            DB::commit();
        } catch (\Exception $exception){
            DB::rollBack();
            throw $exception;
        }
    }

    /**
     * @param array $commands
     * @throws CommandHandlerNotFoundException
     */
    public function handleMany(array $commands): void
    {
        foreach ($commands as $command) {
            $this->handle($command);
        }
    }

    /**
     * @param array $commands
     * @throws CommandHandlerNotFoundException
     */
    public function handleManyWithTransactions(array $commands): void
    {
        try {
            DB::beginTransaction();
            $this->handleMany($commands);
            DB::commit();
        } catch (\Exception $exception){
            DB::rollBack();
            throw $exception;
        }
    }

}
