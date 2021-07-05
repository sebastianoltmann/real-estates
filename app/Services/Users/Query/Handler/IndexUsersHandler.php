<?php

namespace App\Services\Users\Query\Handler;


use App\Services\CQRS\Query;
use App\Services\CQRS\QueryHandler;
use App\Services\Projects\ProjectService;
use App\Services\Projects\ProjectServiceInterface;
use App\Services\Users\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;

class IndexUsersHandler implements QueryHandler
{

    public function __construct(
        private UserRepository $userRepository
    )
    {
    }

    /**
     * @param Query $query
     * @return mixed|void
     */
    public function execute(Query $query)
    {
        return [
            'users' => $this->userRepository->getUsers(),
            'user' => auth()->user(),
        ];
    }
}
