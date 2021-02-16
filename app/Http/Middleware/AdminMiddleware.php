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
        $site = session('sid', request('site'));
        $site = is_numeric($site) ? Site::findOrFail($site) : $site;
        if (!($site instanceof Site)) abort(404);
        defined("SID") or define('SID', $site['id']);
        SiteService::cache($site);
        ConfigService::site($site);
        //模块
        $module = session('mid', request('module'));
        $module = is_numeric($module) ? Module::findOrFail($module) : $module;
        defined("MID") or define('MID', $module['id']);
        ModuleService::cache($module);
        ConfigService::module($site, $module);
        $this->check($site, $module);
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
