<?php


namespace App\Services\Users\Repositories;

use App\Common\Repositories\Eloquent\EloquentRepository;
use App\Models\User;

class UserRepository extends EloquentRepository
{

    /**
     * @return string
     */
    public function model():string
    {
        return User::class;
    }
}
