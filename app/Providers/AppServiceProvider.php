<?php

namespace App\Providers;

use App\Http\Controllers\Content\config\Tag;
use Houdunwang\Alipay\AliPay;
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
        //自定义指令
        (new Tag())->make();
    }

    protected function loadConfig()
    {
        Aliyun::config(config_get('admin.aliyun', []));
        WeChat::config(config('hd_wechat', []));
        AliPay::config(config_get('admin.alipay',[]));
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
