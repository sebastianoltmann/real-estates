<?php

namespace Database\Seeders\Production;

use App\Models\User;
use App\Services\Permissions\Roles;
use App\Services\Projects\Models\Project;
use Database\Seeders\Development\ProjectSeeder as ProjectSeederDevelopment;

class ProjectSeeder extends ProjectSeederDevelopment
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = $this->users();

        Project::reguard();

        foreach($this->projects() as $project) {

            /**
             * @var Project $projectModel
             */
            $projectModel = Project::whereAlias($project['alias'])->first();

            if(empty($projectModel)) {
                $projectModel = Project::create($project);
            }

            if(!empty($project['domain']) &&
                !$projectModel->projectDomains()->whereDomain($project['domain'])->exists()) {
                $projectModel->projectDomains()->create([
                    'domain' => $project['domain'],
                ]);
            }

            if(!$users->isEmpty()) {

                foreach($users as $user) {
                    /**
                     * @var User $user
                     */
                    if(!$user->projects()->whereProjectId($projectModel->id)->exists()) {
                        $user->projects()->attach($projectModel, ['role' => Roles::ADMIN()->getValue()]);
                        $projectModel->owner()->associate($user)->save();
                        $user->switchProject($projectModel);
                    }
                }
            }
        }
    }
}
