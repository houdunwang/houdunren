<?php

namespace App\Http\Middleware;

use App\Models\Module;
use App\Models\Site;
use ModuleService;
use ConfigService;
use SiteService;
use Closure;


/**
 * 模块后台管理中间件
 * @package App\Http\Middleware
 */
class ModuleMiddleware
{
    public function handle($request, Closure $next)
    {
        $this->init();
        $this->check();
        return $next($request);
    }
    /**
     * 站点初始化
     * @return void
     */
    protected function init()
    {
        //站点
        $site = $this->site();
        SiteService::cache($site);
        ConfigService::site($site);
        define("SID", $site['id']);
        //模块
        $module = $this->module($site);
        ModuleService::cache($module);
        ConfigService::module($site, $module);

        return true;
    }

    /**
     * 站点
     * @return void
     */
    protected function site(): Site
    {
        $site = request('site');
        if (is_numeric($site)) {
            $site = Site::findOrFail($site);
        }
        $site = $site ?: SiteService::getByDomain();
        return $site ?: abort(404);
    }

    /**
     * 模块
     * @param Site $site
     * @return Module
     */
    protected function module(Site $site): Module
    {
        $module = ModuleService::getByDomain();
        if (!$module) {
            $module = $site->module;
        }
        if (!$module) {
            abort(404);
        }
        return $module;
    }

    protected function check()
    {
        //站点模块检测
        $exist = ModuleService::siteModules(site())->contains('name', module()['name']);
        if (!$exist) abort(404, '站点不存在模块');
    }
}
