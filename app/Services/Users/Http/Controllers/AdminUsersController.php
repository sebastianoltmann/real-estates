<?php

namespace App\Services\Users\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\CQRS\Facades\CommandBusFacade as CommandBus;
use App\Services\CQRS\Facades\QueryDispatcherFacade as QueryDispatcher;
use App\Services\Users\Command\CreateUserCommand;
use App\Services\Users\Command\DeleteUserCommand;
use App\Services\Users\Command\UpdateUserCommand;
use App\Services\Users\Http\Requests\StoreUserRequest;
use App\Services\Users\Http\Requests\UpdateUserRequest;
use App\Services\Users\Query\EditUserQuery;
use App\Services\Users\Query\IndexUsersQuery;
use Illuminate\Support\Facades\Redirect;

class AdminUsersController extends Controller
{
    /**
     * UsersController constructor.
     */
    public function __construct()
    {
        $this->authorizeResource(User::class);
    }

    public function index()
    {
        return view('users.index', QueryDispatcher::execute(new IndexUsersQuery()));
    }

    /**
     * @param User $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create(User $user)
    {
        return $this->edit($user);
    }

    /**
     * @param User $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(User $user)
    {
        return view('users.edit', QueryDispatcher::execute(new EditUserQuery($user)));
    }

    /**
     * @param StoreUserRequest $request
     * @return mixed
     */
    public function store(StoreUserRequest $request)
    {
        try {
            CommandBus::handleWithTransaction(
                new CreateUserCommand($request->validated())
            );

            return Redirect::route('admin.users.index')
                ->withSuccessMsg('User successfully added.');
        } catch(\Exception $e){
            return back()->withInput()->withDangerMsg($e->getMessage());
        }
    }

    /**
     * @param UpdateUserRequest $request
     * @param User              $user
     * @return mixed
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        try {
            CommandBus::handleWithTransaction(
                new UpdateUserCommand($request->validated(), $user)
            );

            return Redirect::route('admin.users.index')
                ->withSuccessMsg('User successfully updated.');
        } catch(\Exception $e){
            return back()->withInput()->withDangerMsg($e->getMessage());
        }
    }

    /**
     * @param User $user
     * @return mixed
     */
    public function destroy(User $user){
        try {
            CommandBus::handleWithTransaction(
                new DeleteUserCommand($user)
            );

            return Redirect::route('admin.users.index')
                ->withSuccessMsg('User successfully moved to trush.');
        } catch(\Exception $e){
            return back()->withInput()->withDangerMsg($e->getMessage());
        }
    }
}
