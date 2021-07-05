<?php


namespace App\Services\CQRS;


interface CommandHandler
{

    /**
     * @param Command $command
     * @return void
     */
    public function handle(Command $command): void;
}