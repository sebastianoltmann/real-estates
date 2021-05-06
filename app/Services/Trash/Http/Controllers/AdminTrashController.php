<?php

namespace App\Services\Trash\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\CQRS\Facades\CommandBusFacade as CommandBus;
use App\Services\CQRS\Facades\QueryDispatcherFacade as QueryDispatcher;
use App\Services\Trash\Command\ForceDeleteTrashedModelCommand;
use App\Services\Trash\Command\RestoreTrashedModelCommand;
use App\Services\Trash\Http\Requests\ForceDeleteTrashedModelRequest;
use App\Services\Trash\Http\Requests\IndexTrashRequest;
use App\Services\Trash\Http\Requests\RestoreTrashedModelRequest;
use App\Services\Trash\Query\IndexTrashQuery;
use Illuminate\Support\Facades\Redirect;

class AdminTrashController extends Controller
{

    /**
     * @param IndexTrashRequest $request
     * @param string            $resource
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(IndexTrashRequest $request, string $resource = 'documents')
    {
        return view('trash.index', QueryDispatcher::execute(new IndexTrashQuery($resource)));
    }

    /**
     * @param RestoreTrashedModelRequest $request
     * @param string                     $resource
     * @return mixed
     */
    public function restore(RestoreTrashedModelRequest $request, string $resource)
    {
        try {
            CommandBus::handleWithTransaction(
                new RestoreTrashedModelCommand($request->model())
            );
            return Redirect::route('admin.trash.index', $resource)
                ->withSuccessMsg(
                    __('Entity ":name" successfully restored', ['name' => $request->model()->name])
                );
        } catch(\Exception $e) {
            return back()->withInput()->withDangerMsg($e->getMessage());
        }
    }

    /**
     * @param ForceDeleteTrashedModelRequest $request
     * @param string                         $resource
     * @return mixed
     */
    public function forceDelete(ForceDeleteTrashedModelRequest $request, string $resource)
    {
        try {
            CommandBus::handleWithTransaction(
                new ForceDeleteTrashedModelCommand($request->model())
            );
            return Redirect::route('admin.trash.index', $resource)
                ->withSuccessMsg(
                    __('Entity ":name" successfully deleted from database', ['name' => $request->model()->name])
                );
        } catch(\Exception $e) {
            return back()->withInput()->withDangerMsg($e->getMessage());
        }
    }


}
