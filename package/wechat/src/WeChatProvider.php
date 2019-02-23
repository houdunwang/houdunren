<?php namespace Houdunwang\WeChat;

use Illuminate\Support\ServiceProvider;

class WeChatProvider extends ServiceProvider
{
    //延迟加载
    public function boot()
    {
        //配置文件
        $this->publishes([
            __DIR__ . '/config/wechat.php' => config_path('hd_wechat.php'),
        ]);
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('HDWeChat', function ($app) {
            return new WeChat($app);
        });
    }
}
