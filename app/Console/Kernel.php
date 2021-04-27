<?php

namespace App\Console;

use App\Services\CQRS\Console\CommandHandlerMakeCommand;
use App\Services\CQRS\Console\CommandMakeCommand;
use App\Services\CQRS\Console\QueryHandlerMakeCommand;
use App\Services\CQRS\Console\QueryMakeCommand;
use App\Services\Projects\Console\ProjectSwitch;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        ProjectSwitch::class,

        QueryMakeCommand::class,
        QueryHandlerMakeCommand::class,
        CommandMakeCommand::class,
        CommandHandlerMakeCommand::class
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
