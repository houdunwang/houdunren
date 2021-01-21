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
            if ($module = $site->module) {
                //加载站点与模块配置
                ModuleService::module($module->name);
                ConfigService::module($module);
            }
        }
    }
}
