<?php

namespace App\Providers;

use App\Models\Team;
use App\Models\User;
use App\Policies\TeamPolicy;
use App\Services\Documents\Models\Document;
use App\Services\Documents\Policies\DocumentPolicy;
use App\Services\Projects\Models\Project;
use App\Services\Projects\Policies\ProjectPolicy;
use App\Services\RealEstates\Models\RealEstate;
use App\Services\RealEstates\Policies\RealEstatePolicy;
use App\Services\Trash\Policies\TrashPolicy;
use App\Services\Users\Policies\UserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Project::class => ProjectPolicy::class,
        Document::class => DocumentPolicy::class,
        User::class => UserPolicy::class,
        RealEstate::class => RealEstatePolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('viewAny-trash', [TrashPolicy::class, 'viewAny']);
    }
}
