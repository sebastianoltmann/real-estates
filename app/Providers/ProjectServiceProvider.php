<?php

namespace App\Providers;

use App\Services\Projects\Models\Project;
use App\Services\Projects\ProjectService;
use App\Services\Projects\ProjectServiceInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;

class ProjectServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('project', ProjectServiceInterface::class);
        $this->app->singleton(ProjectServiceInterface::class, function(Application $app) {

            /**
             * @var Project $project
             */
            $project = Project::whereHas('projectDomains', function(Builder $query) use ($app) {
                $query->whereDomain($app->request->getHost());
            })->first();

            Config::set('project.alias', $project->alias);
            Config::set('app.name', $project->name);

            return new ProjectService($project);
        });
    }

    /**
     * Bootstrap services.
     *
     *
     * @return void
     */
    public function boot()
    {
    }
}
