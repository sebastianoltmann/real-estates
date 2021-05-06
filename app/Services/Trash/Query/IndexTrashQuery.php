<?php

namespace App\Services\Trash\Query;


use App\Services\CQRS\Query;

class IndexTrashQuery implements Query
{

    /**
     * IndexTrashQuery constructor.
     */
    public function __construct(
        private string $resource
    )
    {
    }

    /**
     * @return string
     */
    public function getResource(): string
    {
        return $this->resource;
    }
}
