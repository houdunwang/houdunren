<?php

namespace App\Providers;

use Houdunwang\Aliyun\Aliyun;
use Houdunwang\WeChat\WeChat;
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
        \Carbon\Carbon::setLocale('zh');
        $this->loadConfig();
    }

    protected function loadConfig()
    {
        //阿里云
        Aliyun::config([
            'regionId'  => config('aliyun.regionId'),
            'accessId'  => config('aliyun.accessId'),
            'accessKey' => config('aliyun.accessKey'),
        ]);
        //微信公众号
        WeChat::config(config('wechat'));
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
