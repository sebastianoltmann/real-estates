<?php

namespace App\Services\CQRS\Console;


use Illuminate\Support\Facades\Artisan;
use ReflectionClass;

class CommandMakeCommand extends QueryMakeCommand
{
    /**
     * The console command signature.
     *
     * @var string
     */
    protected $signature = 'cqrs:command {name} {--only-command}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new command class';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Command';

    /**
     * The class which create handler
     *
     * @var string
     */
    protected $handlerCommand = CommandHandlerMakeCommand::class;

    public function handle()
    {
        if($this->hasOption('only-command') && !$this->option('only-command')) {
            $this->buildHandler();
        }
        parent::handle();
    }

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__ . '/stubs/command.stub';
    }
}
