<?php

namespace App\Services\Documents\Query;


use App\Models\User;
use App\Services\CQRS\Query;

class IndexDocumentQuery implements Query
{

    /**
     * IndexDocumentQuery constructor.
     *
     * @param User $user
     */
    public function __construct(
        private User $user
    )
    {
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }
}
