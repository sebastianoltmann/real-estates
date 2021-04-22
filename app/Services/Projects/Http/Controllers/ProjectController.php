<?php

namespace App\Services\Projects\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\Projects\Http\Requests\CreateProjectRequest;
use App\Services\Projects\Http\Requests\ShowProjectRequest;
use App\Services\Projects\Models\Project;

class ProjectController extends Controller
{
    /**
     * Show the project management screen.
     *
     * @param ShowProjectRequest $request
     * @param Project            $project
     * @return \Illuminate\View\View
     */
    public function show(ShowProjectRequest $request, Project $project)
    {
        return view('teams.show', [
            'user' => $request->user(),
            'team' => $project,
        ]);
    }

    /**
     * Show the project creation screen.
     *
     * @param  CreateProjectRequest  $request
     * @return \Illuminate\View\View
     */
    public function create(CreateProjectRequest $request)
    {
        return view('teams.create', [
            'user' => $request->user(),
        ]);
    }
}
