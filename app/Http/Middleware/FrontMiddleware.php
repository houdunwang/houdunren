<?php

namespace App\Http\Middleware;

use ConfigService;
use SiteService;
use ModuleService;
use Exception;
use Closure;
use App\Models\Site;
use App\Models\Module;

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
            SiteService::cache($site);
            //加载站点配置
            ConfigService::site($site);
            if ($module = $this->module($site)) {
                //加载站点与模块配置
                ModuleService::cache($module);
                ConfigService::module($site, $module);
            }
        }
    }

    /**
     * 获取模块
     *
     * @param Site $site
     * @return void
     */
    protected function module(Site $site)
    {
        $module = null;
        $path = parse_url(url()->current())['path'] ?? '';
        if ($path) {
            preg_match('/^\/(\w+)\/?/', $path, $match);
            if ($name = $match[1] ?? '') {
                $module = Module::where('name', $name)->first();
            }
        }
        return $module ?? $site->module;
    }
}
