<?php

namespace App\Services\CQRS\Console;



class CommandHandlerMakeCommand extends QueryHandlerMakeCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'cqrs:command-handler';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new command handler class';


    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__.'/stubs/command.handler.stub';
    }
}
