<?php

namespace App\Services\CQRS\Console;


use Illuminate\Console\Command;
use Illuminate\Console\GeneratorCommand;
use Illuminate\Support\Facades\Artisan;
use ReflectionClass;

class QueryMakeCommand extends GeneratorCommand
{
    /**
     * The console command signature.
     *
     * @var string
     */
    protected $signature = 'cqrs:query {name} {--only-query}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new query class';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Query';

    /**
     * The class which create handler
     *
     * @var string
     */
    protected $handlerCommand = QueryHandlerMakeCommand::class;

    public function handle()
    {
        if($this->hasOption('only-query') && !$this->option('only-query')) {
            $this->buildHandler();
        }
        parent::handle();
        Artisan::call('dump-autoload');

    }

    protected function buildHandler()
    {
        $name = $this->qualifyClass($this->getNameInput());
        $nameHandler = $this->replaceNamespaceToHandler($name) . '\\' . $this->replaceClassToHandler($name);
        Artisan::call($this->getHandlerName(), ['name' => $nameHandler]);
    }

    /**
     * @param string $name
     * @return string
     */
    private function replaceNamespaceToHandler(string $name): string
    {
        $queryHandlerType = $this->getHandlerType();
        return $this->getNamespace($name) . '\\' . $queryHandlerType;
    }

    /**
     * @return string
     * @throws \ReflectionException
     */
    protected function getHandlerType(): string
    {
        return $this->handlerCommand()->getType();
    }

    /**
     * @return string
     * @throws \ReflectionException
     */
    protected function getHandlerName(): string
    {
        return $this->handlerCommand()->getName();
    }

    /**
     * @return Command
     * @throws \ReflectionException
     */
    private function handlerCommand(): Command
    {
        $queryHandlerClass = new ReflectionClass($this->handlerCommand);
        return $queryHandlerClass->newInstanceWithoutConstructor();
    }

    /**
     * @param string $name
     * @return string
     * @throws \ReflectionException
     */
    private function replaceClassToHandler(string $name): string
    {
        $queryHandlerType = $this->getHandlerType();
        $class = $this->getClass($name);

        if(strpos($class, $this->getType()) !== false) {
            return str_replace($this->getType(), $queryHandlerType, $class);
        } else {
            return "{$class}{$queryHandlerType}";
        }
    }

    /**
     * @param string $name
     * @return string
     */
    protected function getClass(string $name): string
    {
        return str_replace($this->getNamespace($name) . '\\', '', $name);
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__ . '/stubs/query.stub';
    }
}
