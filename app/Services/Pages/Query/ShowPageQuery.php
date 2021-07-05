<?php

namespace App\Services\Pages\Query;


use App\Services\CQRS\Query;

class ShowPageQuery implements Query
{

    /**
     * ShowPageQuery constructor.
     *
     * @param string $slug
     */
    public function __construct(
        private string $slug
    )
    {
    }

    /**
     * @return string
     */
    public function getSlug(): string
    {
        return $this->slug;
    }
}
