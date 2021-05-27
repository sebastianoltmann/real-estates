<?php

namespace App\Providers;

use App\Services\Projects\Models\Project;
use App\Services\Projects\ProjectService;
use App\Services\Projects\ProjectServiceInterface;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Services\Projects\Repositories\ProjectRepository;

class ProjectServiceProvider extends ServiceProvider
{

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->alias(ProjectServiceInterface::class, 'project');
        $this->app->singleton(ProjectServiceInterface::class, function(Application $app) {
            /**
             * @var Project $project
             */
            $project = $app->make(ProjectRepository::class)
                ->findByDomain($app->request->getHost());

            Config::set('project.alias', $project->alias);

            $this->assignAppConfig($project);
            $this->assignMailConfig($project);
            $this->assignLanguagesConfig($project);

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
        $this->app->make('project');
    }

    /**
     * @param Project $project
     * @param string  $config
     */
    private function mergeConfig(Project $project, string $config){
        if($configProject = Config::get("project.{$project->alias}.{$config}")){
            $defaultConfig =  Config::get($config);
            $configProject = array_merge($defaultConfig, $configProject);
            Config::set($config, $configProject);
        }
    }

    /**
     * @param Project $project
     * @param string  $config
     */
    private function overrideConfig(Project $project, string $config){
        if($configProject = Config::get("project.{$project->alias}.{$config}")){
            Config::set($config, $configProject);
        }
    }


    /**
     * @param Project $project
     */
    private function assignAppConfig(Project $project)
    {
        $this->mergeConfig($project, 'app');
        Config::set('app.name', $project->name);
    }

    /**
     * @param Project $project
     */
    private function assignMailConfig(Project $project)
    {
        $this->mergeConfig($project, 'mail');
    }



    /**
     * @param Project $project
     */
    private function assignLanguagesConfig(Project $project)
    {
        $this->mergeConfig($project, 'laravellocalization');

        $supportedLocales = Config::get('laravellocalization.supportedLocales');
        if(count($supportedLocales) == 1){
            LaravelLocalization::setLocale(array_key_first($supportedLocales));
        }
        LaravelLocalization::setSupportedLocales(null);

    }
}
