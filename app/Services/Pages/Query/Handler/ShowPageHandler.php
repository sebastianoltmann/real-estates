<?php

namespace App\Services\Pages\Query\Handler;


use App\Services\CQRS\Query;
use App\Services\CQRS\QueryHandler;
use App\Services\Pages\PageSlugParser;
use App\Services\Pages\Query\ShowPageQuery;
use App\Services\Pages\VM\DefaultPageVM;
use Illuminate\Support\Facades\App;

class ShowPageHandler implements QueryHandler
{

    /**
     * @param ShowPageQuery $query
     * @return mixed|void
     */
    public function execute(Query $query)
    {
        $viewModels = PageSlugParser::parseSlugToNamespaces($query->getSlug());
        $viewModels = $viewModels->filter(fn($vm) => class_exists($vm));

        return !$viewModels->isEmpty()
            ? App::make($viewModels->first())
            : new DefaultPageVM($query->getSlug());
    }
}
