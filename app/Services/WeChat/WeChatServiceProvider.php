<?php

namespace App\Services\WeChat;

use Illuminate\Support\ServiceProvider;

class WeChatServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('wechat', function () {
            return new WeChatService();
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
