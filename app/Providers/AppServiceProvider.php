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
        config(['app.url' => host()]);
        $this->initialization();
        $this->observer();
        \Carbon\Carbon::setLocale('zh');
        \Schema::defaultStringLength(191);
    }

    protected function observer()
    {
        Package::observe(PackageObserver::class);
        User::observe(UserObserver::class);
    }

    protected function initialization()
    {
        if (is_file(base_path('database.php'))) {
            $config = config('database.connections.mysql');
            $config = array_merge($config, include base_path('database.php'));
            config(['database.connections.mysql' => $config]);
        }
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
