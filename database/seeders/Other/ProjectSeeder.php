<?php

namespace Database\Seeders\Other;

use App\Models\User;
use App\Services\Projects\Models\Project;
use App\Services\Projects\Models\ProjectDomain;
use App\Services\Permissions\Roles;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;
use App\Services\Projects\Models\ProjectMembership;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Project::truncate();
        ProjectDomain::truncate();
        ProjectMembership::truncate();
        Schema::enableForeignKeyConstraints();

        Project::reguard();

        $users = User::all();

        foreach($this->projects() as $project){

            /**
             * @var Project $projectModel
             */
            $projectModel = Project::create($project);

            if(!empty($project['domain'])){
                $projectModel->projectDomains()->create([
                    'domain' => $project['domain'],
                ]);
            }

            if(!$users->isEmpty()){

                foreach($users as $user){
                    /**
                     * @var User $user
                     */

                    $user->projects()->attach($projectModel, ['role' => Roles::ADMIN()->getValue()]);
                    $projectModel->owner()->associate($user)->save();
                    $user->switchProject($projectModel);
                }
            }
        }
    }

    private function projects(): array
    {
        return Config::get('project.projects');
    }
}
