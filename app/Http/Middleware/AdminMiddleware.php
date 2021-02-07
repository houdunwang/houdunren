<?php

namespace App\Http\Middleware;

use PermissionService;
use App\Models\Module;
use App\Models\Site;
use ModuleService;
use ConfigService;
use UserService;
use SiteService;
use Closure;
use Auth;
use Illuminate\Contracts\Container\BindingResolutionException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * 模块后台管理中间件
 * @package App\Http\Middleware
 */
class AdminMiddleware
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
     * @throws HttpException
     * @throws NotFoundHttpException
     */
    protected function init()
    {
        if (!Auth::check()) {
            abort(401);
        }
        //站点
        $site = $this->site();
        SiteService::cache($site);
        ConfigService::site($site);
        define("SID", $site['id']);
        //模块
        $module = $this->module($site);
        ModuleService::cache($module);
        ConfigService::module($site, $module);
        //权限检测
        $this->check($site, $module);
    }

    /**
     * 站点
     * @return Site
     * @throws BindingResolutionException
     * @throws HttpException
     * @throws NotFoundHttpException
     */
    protected function site(): Site
    {
        $site = request('site');
        if (is_numeric($site)) {
            $site = Site::findOrFail($site);
        }
        if ($site instanceof Site) {
            return $site;
        }
        abort(404);
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
        $module = ModuleService::getByDomain();
        //站点模块检测
        $exist = $module ? ModuleService::siteModules($site)->contains('name', $module['name']) : null;
        if (!$exist) {
            abort(404, '站点不存在模块');
        }
        return $module;
    }

    /**
     * 权限检测
     * @param Site $site
     * @param Module $module
     * @return bool
     * @throws HttpException
     * @throws NotFoundHttpException
     */
    protected function check(Site $site, Module $module): bool
    {
        //站点模块检测
        if (ModuleService::siteHasModule($site, $module) === false) {
            abort(404, '站点不存在模块');
        }
        //超级管理员与站长检测
        if (UserService::isMaster($site, Auth::user())) {
            return true;
        }
        //管理员检测
        if (UserService::isAdmin($site, Auth::user()) && PermissionService::checkModulePermission($site, $module)) {
            return true;
        }
        abort(403, '没有模块管理权限');
    }
}
