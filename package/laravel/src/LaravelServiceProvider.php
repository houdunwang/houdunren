<?php
/** .-------------------------------------------------------------------
 * |      Site: www.hdcms.com
 * |      Date: 2018/6/25 下午2:54
 * |    Author: 向军大叔 <2300071698@qq.com>
 * '-------------------------------------------------------------------*/

namespace Houdunwang\Laravel;

use Illuminate\Support\ServiceProvider;

class LaravelServiceProvider extends ServiceProvider
{
    public $singletons = [
        'hd-menu' => MenusService::class,
    ];

    public function boot()
    {
    }

    public function register()
    {
        $this->app->singleton('HDModule', function () {
            return new Provider();
        });
    }
}