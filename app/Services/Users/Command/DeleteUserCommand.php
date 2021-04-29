<?php

namespace App\Services\Users\Command;


use App\Models\User;
use App\Services\CQRS\Command;

class DeleteUserCommand implements Command
{

    /**
     * DeleteUserCommand constructor.
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
