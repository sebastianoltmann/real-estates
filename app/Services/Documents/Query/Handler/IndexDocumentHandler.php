<?php

namespace App\Services\Documents\Query\Handler;


use App\Services\CQRS\Query;
use App\Services\CQRS\QueryHandler;
use App\Services\Documents\Models\DocumentCategory;
use App\Services\Documents\Query\IndexDocumentQuery;

class IndexDocumentHandler implements QueryHandler
{

    /**
     * @param IndexDocumentQuery $query
     * @return mixed|void
     */
    public function execute(Query $query)
    {
        return [
            'user' => $query->getUser(),
            'documentCategories' => DocumentCategory::all()
        ];
    }
}
