<?php

namespace App\Http\Middleware;

use ConfigService;
use SiteService;
use ModuleService;
use Exception;
use Closure;

/**
 * 前台管理中间件
 * @package App\Http\Middleware
 */
class FrontMiddleware
{
    public function handle($request, Closure $next)
    {
        $this->init();
        return $next($request);
    }

    /**
     * 初始化站点与模块数据
     *
     * @return void
     */
    protected function init()
    {
        //根据域名获取站点
        $site = SiteService::getByDomain();
        if ($site) {
            SiteService::site($site);
            //加载站点配置
            ConfigService::site($site);
            // dd($site->toArray());
            // dd($site->module);
            if ($module = $site->module) {
                ModuleService::module($module->name);
                //加载模块配置
                ConfigService::module($module);
            }
        }
    }
}
