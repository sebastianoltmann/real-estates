<?php

namespace App\Services\Users\Query;


use App\Models\User;
use App\Services\CQRS\Query;

class EditUserQuery implements Query
{

    /**
     * EditUserQuery constructor.
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
