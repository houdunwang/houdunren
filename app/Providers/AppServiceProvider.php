<?php

namespace App\Providers;

use App\Models\Package;
use App\Observers\PackageObserver;
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
        $this->observer();
    }

    protected function observer()
    {
        Package::observe(PackageObserver::class);
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
