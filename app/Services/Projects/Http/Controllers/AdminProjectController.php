<?php

namespace App\Services\Projects\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\Projects\Http\Requests\CreateProjectRequest;
use App\Services\Projects\Http\Requests\ShowProjectRequest;
use App\Services\Projects\Models\Project;

class AdminProjectController extends Controller
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
        return view('admin.projects.show', [
            'user' => $request->user(),
            'project' => $project,
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
        return view('admin.projects.create', [
            'user' => $request->user(),
        ]);
    }
}
