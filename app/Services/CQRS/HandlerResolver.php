<?php


namespace App\Services\CQRS;

use Psr\Container\ContainerInterface;
use HaydenPierce\ClassFinder\ClassFinder;

class HandlerResolver implements HandlerResolverInterface
{

    const HANDLER_SUFFIX = 'Handler';

    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * Create a new class instance.
     *
     * @param  \Psr\Container\ContainerInterface;
     * @return void
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function handler($command)
    {
        $handlerContainerName = $this->getHandlerName($command);
        return $this->container->get($handlerContainerName);
    }

    private function getHandlerName($command) : string
    {
        $commandReflectionClass = new \ReflectionClass(get_class($command));

        ClassFinder::disablePSR4Support();
        $classes = ClassFinder::getClassesInNamespace(
            $commandReflectionClass->getNamespaceName(),
            ClassFinder::RECURSIVE_MODE
        );

        if(empty($classes)) return '';

        $scoresClasses = [];
        foreach ($classes as $class){
            $handlerReflectionClass = new \ReflectionClass($class);

            if($handlerReflectionClass->getShortName() === $commandReflectionClass->getShortName())
                continue;

            $scoresClasses[$class] = levenshtein(
                $handlerReflectionClass->getShortName(),
                $commandReflectionClass->getShortName().self::HANDLER_SUFFIX
            );
        }
        asort($scoresClasses);
        return key($scoresClasses);
    }
    
}