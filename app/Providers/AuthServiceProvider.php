<?php

namespace App\Providers;

use App\Models\Site;
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
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::before(function ($user, $ability) {
            preg_match('/s(\d+?)-/', $ability, $matchs);
            $site = Site::find($matchs[1]);
            return $user->isSuperAdmin || $site->master->id == auth()->id();
        });
    }
}
