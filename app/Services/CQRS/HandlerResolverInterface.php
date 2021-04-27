<?php


namespace App\Services\CQRS;


interface HandlerResolverInterface
{
    public function handler($command);
}