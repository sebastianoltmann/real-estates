<?php

namespace App\Services\Documents\Query\Handler;


use App\Services\CQRS\Query;
use App\Services\CQRS\QueryHandler;
use App\Services\Documents\Models\DocumentCategory;
use App\Services\Documents\Query\EditDocumentQuery;
use App\Services\Projects\ProjectService;
use App\Services\Projects\ProjectServiceInterface;
use Illuminate\Support\Facades\Auth;

class EditDocumentHandler implements QueryHandler
{

    /**
     * EditDocumentHandler constructor.
     *
     * @param ProjectServiceInterface $projectService
     */
    public function __construct(
        private ProjectServiceInterface $projectService)
    {
    }

    /**
     * @param EditDocumentQuery $query
     * @return mixed|void
     */
    public function execute(Query $query)
    {
        return [
            'document' => $query->getDocument(),
            'categories' => DocumentCategory::all(),
            'user' => Auth::user(),
            'users' => $this->projectService->getProject()->usersWithoutAdmins,
        ];
    }
}
