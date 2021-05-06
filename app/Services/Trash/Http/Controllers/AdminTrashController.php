<?php

namespace App\Services\Trash\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\CQRS\Facades\QueryDispatcherFacade as QueryDispatcher;
use App\Services\Trash\Http\Requests\IndexTrashRequest;
use App\Services\Trash\Query\IndexTrashQuery;

class AdminTrashController extends Controller
{

    /**
     * @param string $resource
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(IndexTrashRequest $request, string $resource = 'documents')
    {
        return view('trash.index', QueryDispatcher::execute(new IndexTrashQuery($resource)));
    }


}
