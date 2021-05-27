<?php

namespace App\Services\Projects\Console;

use App\Services\Projects\Models\Project;
use App\Services\Projects\Models\ProjectDomain;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Config;

class ProjectSwitch extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'project {alias : Project alias to which one should swap}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Switch local domain to another Tenant for dev purpose.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $alias = $this->argument('alias');

        if(App::environment('production')) {
            return $this->warn("Sorry but we can not switch project on production environment - [{$alias}]");
        }

        /**
         * @var ProjectDomain $domain
         */
        $domain = ProjectDomain::whereDomain(Config::get('project.dev_domain'))->first();
        if(!$domain) {
            return $this->warn("Sorry but we can not switch project because dev domain is empty - [{$domain}]");
        }

        $project = Project::whereAlias($alias)->first();

        if(!$project)
            return $this->warn("Sorry but we do not found project alias - [{$alias}]");

        $this->switch($project, $domain);
    }

    /**
     * @param Project       $project
     * @param ProjectDomain $domain
     */
    private function switch(Project $project, ProjectDomain $domain)
    {
        $domain->project()->associate($project)->save();

        Artisan::call('config:clear');
        Artisan::call('cache:clear');

        $this->info("Switched project to {$project->alias}.");
    }
}
