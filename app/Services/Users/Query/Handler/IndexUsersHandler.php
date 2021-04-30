<?php

namespace App\Services\Users\Query\Handler;


use App\Services\CQRS\Query;
use App\Services\CQRS\QueryHandler;
use App\Services\Projects\ProjectService;
use App\Services\Projects\ProjectServiceInterface;
use Illuminate\Support\Facades\Auth;

class IndexUsersHandler implements QueryHandler
{

    /**
     * @param Query $query
     * @return mixed|void
     */
    public function execute(Query $query)
    {
        return [
            'users' => Auth::user()->currentProject->usersWithoutAdmins,
            'user' => auth()->user(),
        ];
    }
}
