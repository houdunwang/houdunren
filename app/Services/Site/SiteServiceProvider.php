<?php

namespace App\Services\Site;

use Illuminate\Support\ServiceProvider;
use App\Services\Site\SiteService;

class SiteServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('SiteService', function () {
            return new SiteService();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
