<?php


namespace App\Services\CQRS;


interface QueryHandler
{
    /**
     * @param Query $query
     * @return mixed
     */
    public function execute(Query $query);
}