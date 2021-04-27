<?php

namespace App\Console\Commands\Composer;

use Illuminate\Console\Command;
use Illuminate\Support\Composer;

class DumpAutoload extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dump-autoload';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * The Composer instance.
     *
     * @var Composer
     */
    protected $composer;

    /**
     * DumpAutoload constructor.
     *
     * @param Composer $composer
     */
    public function __construct(Composer $composer)
    {
        parent::__construct();

        $this->composer = $composer;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->composer->dumpOptimized();
    }
}
