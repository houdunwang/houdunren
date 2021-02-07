<?php

namespace App\Http\Middleware;

use App\Models\Module;
use App\Models\Site;
use ModuleService;
use ConfigService;
use SiteService;
use Closure;
use Illuminate\Contracts\Container\BindingResolutionException;
use Symfony\Component\HttpFoundation\Exception\SuspiciousOperationException;
use Symfony\Component\HttpFoundation\Exception\ConflictingHeadersException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * 模块后台管理中间件
 * @package App\Http\Middleware
 */
class ModuleMiddleware
{
    public function handle($request, Closure $next)
    {
        $this->init();
        return $next($request);
    }

    /**
     * 站点初始化
     * @return void
     * @throws BindingResolutionException
     * @throws SuspiciousOperationException
     * @throws ConflictingHeadersException
     * @throws HttpException
     * @throws NotFoundHttpException
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
    }

    /**
     * 站点
     * @return Site
     * @throws BindingResolutionException
     * @throws SuspiciousOperationException
     * @throws ConflictingHeadersException
     * @throws HttpException
     * @throws NotFoundHttpException
     */
    protected function site(): Site
    {
        $site = request('site');
        if (is_numeric($site)) {
            $site = Site::findOrFail($site);
        }
        $site = $site instanceof Site ? $site : SiteService::getByDomain();
        if ($site instanceof Site) {
            return $site;
        }
        abort(404, '站点不存在');
    }

    /**
     * 模块
     * @param Site $site
     * @return Module
     * @throws BindingResolutionException
     * @throws HttpException
     * @throws NotFoundHttpException
     */
    protected function module(Site $site): Module
    {
        $module = ModuleService::getByDomain() ?? $site->module;
        //站点模块检测
        if (ModuleService::siteHasModule($site, $module)) {
            return $module;
        }
        abort(404, '模块不存在');
    }
}
