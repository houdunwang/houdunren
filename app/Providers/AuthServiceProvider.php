<?php

namespace App\Providers;

use App\Models\Group;
use App\Models\Package;
use App\Models\Site;
use App\Policies\GroupPolicy;
use App\Policies\PackagePolicy;
use App\Policies\SitePolicy;
use App\Policies\UserPolicy;
use App\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
        User::class => UserPolicy::class,
        Site::class => SitePolicy::class,
        Group::class => GroupPolicy::class,
        Package::class=>PackagePolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
