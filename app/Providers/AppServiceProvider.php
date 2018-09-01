<?php

namespace App\Providers;

use Houdunwang\Aliyun\Aliyun;
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
        \Schema::defaultStringLength(191);
        if ($this->app->environment() !== 'production') {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }
        $this->loadConfig();
    }

    protected function loadConfig()
    {
        Aliyun::config([
            'regionId'  => hd_config('aliyun.regionId'),
            'accessId'  => hd_config('aliyun.accessId'),
            'accessKey' => hd_config('aliyun.accessKey'),
        ]);
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
