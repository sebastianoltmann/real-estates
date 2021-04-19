<?php

namespace App\Services\Projects\Middleware;

use App\Services\Projects\ProjectService;
use Closure;
use Illuminate\Http\Request;
use App\Services\Projects\Models\Project;
use Illuminate\Http\Response;

class ProjectExist
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $project = Project::whereHas('projectDomains', function($query) use ($request) {
            $query->whereDomain($request->getHost());
        })->first();

        if($project) return $next($request);

        abort(Response::HTTP_NOT_FOUND);
    }
}
