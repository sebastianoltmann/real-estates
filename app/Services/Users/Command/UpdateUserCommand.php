<?php

namespace App\Services\Users\Command;


use App\Models\User;

class UpdateUserCommand extends CreateUserCommand
{

    /**
     * UpdateUserCommand constructor.
     */
    public function __construct(
        array $params,
        protected User $user
    )
    {
        parent::__construct($params);
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }
}
