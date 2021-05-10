<?php

namespace App\Services\Pages\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\CQRS\Facades\QueryDispatcherFacade as QueryDispatcher;
use App\Services\Pages\Query\ShowPageQuery;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function show(Request $request, string $slug)
    {
        return QueryDispatcher::execute(new ShowPageQuery($slug));
    }
}
