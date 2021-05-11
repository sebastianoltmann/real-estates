<?php

namespace App\Services\RealEstates\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\CQRS\Facades\CommandBusFacade as CommandBus;
use App\Services\CQRS\Facades\QueryDispatcherFacade as QueryDispatcher;
use App\Services\RealEstates\Command\CreateRealEstateCommand;
use App\Services\RealEstates\Command\DeleteRealEstateCommand;
use App\Services\RealEstates\Command\UpdateRealEstateCommand;
use App\Services\RealEstates\Http\Requests\CreateRealEstateRequest;
use App\Services\RealEstates\Http\Requests\UpdateRealEstateRequest;
use App\Services\RealEstates\Models\RealEstate;
use App\Services\RealEstates\Query\AdminEditRealEstateQuery;
use App\Services\RealEstates\Query\AdminIndexRealEstateQuery;
use Illuminate\Support\Facades\Redirect;

class AdminRealEstatesController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(RealEstate::class);
    }

    /**s
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('admin.real-estates.index', QueryDispatcher::execute(new AdminIndexRealEstateQuery()));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create(RealEstate $realEstate)
    {
        return $this->edit($realEstate);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param RealEstate $realEstate
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(RealEstate $realEstate)
    {
        return view('admin.real-estates.edit', QueryDispatcher::execute(new AdminEditRealEstateQuery($realEstate)));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRealEstateRequest $request)
    {
        try {
            CommandBus::handleWithTransaction(
                new CreateRealEstateCommand($request->validated())
            );
            return Redirect::route('admin.realEstates.index')
                ->withSuccessMsg(__('Real estate successfully created.'));
        } catch(\Exception $e) {
            return back()->withInput()->withDangerMsg($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param RealEstate $realEstate
     * @return \Illuminate\Http\Response
     */
    public function show(RealEstate $realEstate)
    {
        //
    }

    /**
     * @param UpdateRealEstateRequest $request
     * @param RealEstate              $realEstate
     * @return mixed
     */
    public function update(UpdateRealEstateRequest $request, RealEstate $realEstate)
    {
        try {
            CommandBus::handleWithTransaction(
                new UpdateRealEstateCommand($request->validated(), $realEstate)
            );
            return Redirect::route('admin.realEstates.index')
                ->withSuccessMsg(__('Real estate ":name" successfully updated.', ['name' => $realEstate->name]));
        } catch(\Exception $e) {
            return back()->withInput()->withDangerMsg($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\RealEstate $realEstate
     * @return \Illuminate\Http\Response
     */
    public function destroy(RealEstate $realEstate)
    {
        try {
            CommandBus::handleWithTransaction(
                new DeleteRealEstateCommand($realEstate)
            );

            return Redirect::route('admin.realEstates.index')
                ->withSuccessMsg(__('Real estate ":name" successfully moved to trush.',['name' => $realEstate->name]));
        } catch(\Exception $e){
            return back()->withInput()->withDangerMsg($e->getMessage());
        }
    }
}
