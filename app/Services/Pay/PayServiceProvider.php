<?php

namespace App\Services\Pay;

use Illuminate\Support\ServiceProvider;

class PayServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('pay', function () {
            return new PayService();
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
