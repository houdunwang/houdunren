<?php

namespace App\Http\Middleware;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use PermissionService;
use ModuleService;
use UserService;
use Closure;
use Auth;

/**
 * 模块后台管理中间件
 * @package App\Http\Middleware
 */
class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        $this->check();
        return $next($request);
    }

    /**
     * 权限检测
     * @return bool
     * @throws HttpException
     * @throws NotFoundHttpException
     */
    protected function check(): bool
    {
        $site = site();
        $module = module();
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
