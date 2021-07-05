<?php

namespace Database\Seeders\Development;

use App\Services\Projects\Models\Project;
use App\Services\Projects\Models\ProjectDomain;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

class DevProjectDomainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        if(!ProjectDomain::where('domain', config('project.dev_domain'))->exists()){
            ProjectDomain::create(['domain' => config('project.dev_domain')]);
        }

        if($project = Project::whereIsMain(1)->first()){
            Artisan::call("project {$project->alias}");
        }
    }
}
