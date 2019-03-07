<?php

namespace App\Providers;

use App\Models\Package;
use App\Observers\PackageObserver;
use App\Observers\UserObserver;
use App\User;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->initialization();
        $this->observer();
        $this->debug();
        \Schema::defaultStringLength(191);
    }

    protected function debug()
    {
        if (INSTALLED) {
            config('app.debug', config_get('base.debug', false, 'system'));
        }
    }

    protected function observer()
    {
        Package::observe(PackageObserver::class);
        User::observe(UserObserver::class);
    }

    protected function initialization()
    {
        $config = config('database.connections.mysql');
        $config = array_merge($config, include base_path('database.php'));
        config(['database.connections.mysql' => $config]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
