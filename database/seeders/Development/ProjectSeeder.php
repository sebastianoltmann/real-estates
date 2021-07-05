<?php

namespace Database\Seeders\Development;

use App\Models\User;
use App\Services\Permissions\Roles;
use App\Services\Projects\Models\Project;
use App\Services\Projects\Models\ProjectDomain;
use App\Services\Projects\Models\ProjectMembership;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;

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

        $users = $this->users();

        foreach($this->projects() as $project) {

            /**
             * @var Project $projectModel
             */

            $projectModel = Project::create($project);

            if(!empty($project['domain'])) {
                $projectModel->projectDomains()->create([
                    'domain' => $project['domain'],
                ]);
            }

            if(!$users->isEmpty()) {

                foreach($users as $user) {
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

    /**
     * @return Collection
     */
    protected function users(): Collection
    {
        $users = User::whereHas('projects', function(Builder $query) {
            $query->whereRole(Roles::ADMIN()->getValue());
        })->get();

        return $users->isEmpty()
            ? User::all()
            : $users;
    }

    /**
     * @return array
     */
    protected function projects(): array
    {
        return Config::get('project.projects');
    }
}
