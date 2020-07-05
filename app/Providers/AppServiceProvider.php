<?php

namespace App\Providers;

use App\Models\Config;
use App\Models\Group;
use App\Observers\GroupObserver;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->environment() !== 'production') {
            $this->app->register(TelescopeServiceProvider::class);

            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }

        if ($config = Config::first()) {
            config(['admin' => $config->config]);
        }

        $this->registerObServer();
    }

    protected function registerObServer()
    {
        Group::observe(GroupObserver::class);
    }
}
