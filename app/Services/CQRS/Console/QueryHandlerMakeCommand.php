<?php

namespace App\Services\CQRS\Console;


use Illuminate\Console\GeneratorCommand;
use Illuminate\Support\Facades\Artisan;

class QueryHandlerMakeCommand extends GeneratorCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'cqrs:query-handler';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new query handler class';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Handler';

    public function handle()
    {
        parent::handle();
        Artisan::call('dump-autoload');
    }

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__.'/stubs/query.handler.stub';
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}
