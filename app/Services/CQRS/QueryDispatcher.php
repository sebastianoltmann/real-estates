<?php


namespace App\Services\CQRS;


use App\Services\CQRS\Exceptions\QueryHandlerNotFoundException;

class QueryDispatcher
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
     * @param Query $query
     * @return mixed
     * @throws QueryHandlerNotFoundException
     */
    public function execute(Query $query)
    {
        $handler = $this->handlerResolver->handler($query);

        if(!$handler || !($handler instanceof QueryHandler)){
            throw new QueryHandlerNotFoundException(get_class($query));
        }

        return $handler->execute($query);
    }
}
