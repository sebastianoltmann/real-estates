<?php

namespace App\Providers;

use App\Actions\Jetstream\AddTeamMember;
use App\Actions\Jetstream\CreateTeam;
use App\Actions\Jetstream\DeleteTeam;
use App\Actions\Jetstream\DeleteUser;
use App\Actions\Jetstream\InviteTeamMember;
use App\Actions\Jetstream\RemoveTeamMember;
use App\Actions\Jetstream\UpdateTeamName;
use App\Services\Projects\Models\Project;
use App\Services\Projects\Models\ProjectInvitation;
use App\Services\Projects\Models\ProjectMembership;
use App\Services\Permissions\Roles;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Laravel\Jetstream\Jetstream;
use App\Services\Permissions\Permission;

class JetstreamServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Jetstream::ignoreRoutes();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRoutes();
        $this->configurePermissions();

        Jetstream::useTeamModel(Project::class);
        Jetstream::useMembershipModel(ProjectMembership::class);
        Jetstream::useTeamInvitationModel(ProjectInvitation::class);

        Jetstream::createTeamsUsing(CreateTeam::class);
        Jetstream::updateTeamNamesUsing(UpdateTeamName::class);
        Jetstream::addTeamMembersUsing(AddTeamMember::class);
        Jetstream::inviteTeamMembersUsing(InviteTeamMember::class);
        Jetstream::removeTeamMembersUsing(RemoveTeamMember::class);
        Jetstream::deleteTeamsUsing(DeleteTeam::class);
        Jetstream::deleteUsersUsing(DeleteUser::class);
    }

    /**
     * Configure the routes offered by the application.
     *
     * @return void
     */
    protected function configureRoutes()
    {
        Route::group([
            'domain' => config('jetstream.domain', null),
            'prefix' => config('jetstream.prefix', config('jetstream.path')),
        ], function () {
            $this->loadRoutesFrom(base_path('routes/jetstream.php'));
        });
    }

    /**
     * Configure the roles and permissions that are available within the application.
     *
     * @return void
     */
    protected function configurePermissions()
    {
        Jetstream::defaultApiTokenPermissions(['read']);

        Jetstream::role(Roles::SUPER_ADMIN()->getValue(), __('Super Administrator'), [
            Permission::READ()->getValue(),
            Permission::UPDATE()->getValue(),
            Permission::DELETE()->getValue(),
            Permission::CREATE()->getValue(),

            Permission::DOCUMENT_READ()->getValue(),
            Permission::DOCUMENT_UPDATE()->getValue(),
            Permission::DOCUMENT_DELETE()->getValue(),
            Permission::DOCUMENT_CREATE()->getValue()
        ]);

        Jetstream::role(Roles::ADMIN()->getValue(), __('Administrator'), [
            Permission::READ()->getValue(),
            Permission::UPDATE()->getValue(),
            Permission::DELETE()->getValue(),
            Permission::CREATE()->getValue(),

            Permission::DOCUMENT_READ()->getValue(),
            Permission::DOCUMENT_UPDATE()->getValue(),
            Permission::DOCUMENT_DELETE()->getValue(),
            Permission::DOCUMENT_CREATE()->getValue()
        ]);

        Jetstream::role(Roles::USER()->getValue(), __('User'), [
            Permission::READ()->getValue(),
            Permission::DOCUMENT_READ()->getValue()
        ]);
    }
}
