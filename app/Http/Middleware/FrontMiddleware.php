<?php

namespace App\Http\Middleware;

use App\Models\Module;
use ConfigService;
use SiteService;
use ModuleService;
use Closure;

/**
 * 前台管理中间件
 * @package App\Http\Middleware
 */
class FrontMiddleware
{
    public function handle($request, Closure $next)
    {
        if ($this->siteInit() === false) {
            abort(404, '站点不存在');
        }
        if ($this->moduleInit() === false) {
            abort(404, '模块不存在，或站点设置默认模块');
        }
        return $next($request);
    }

    /**
     * 站点初始化
     *
     * @return boolean
     */
    protected function siteInit(): bool
    {
        //根据域名获取站点
        $site = SiteService::getByDomain();
        if (!$site) return false;
        //加载站点配置
        SiteService::cache($site);
        ConfigService::site($site);
        return true;
    }

    /**
     * 模块初始化
     *
     * @return boolean
     */
    protected function moduleInit(): bool
    {
        if ($module = $this->getModule()) {
            //缓存站点与模块
            ModuleService::cache($module);
            ConfigService::module(site(), $module);
            return true;
        }
        return false;
    }

    /**
     * 识别模块
     *
     * @return void
     */
    protected function getModule()
    {
        $path = parse_url(url()->current())['path'] ?? '';
        $module = null;
        if ($path) {
            preg_match('/^\/api\/(\w+)\/?/i', $path, $match);
            if ($name = $match[1] ?? '') {
                $module = Module::where('name', $name)->first();
            }
        }

        //URL没有模块标识时，使用站点默认模块
        return $module ?? site()->module;
    }
}
