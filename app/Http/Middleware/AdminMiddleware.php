<?php

namespace App\Http\Middleware;

use PermissionService;
use ModuleService;
use ConfigService;
use UserService;
use SiteService;
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
        $this->siteInit() || abort(404, '站点不存在');
        $this->moduleInit() || abort(404, '模块不存在，或站点设置默认模块');
        $this->verify() || abort(403, '你没有操作权限');

        return $next($request);
    }

    /**
     * 缓存数据
     * @return void
     */
    protected function cache()
    {
        $name = 'admin-' . Auth::id();
        return cache($name);
    }
    /**
     * 站点初始化
     * @return boolean
     */
    protected function siteInit(): bool
    {
        if ($site = $this->cache()['site']) {
            SiteService::cache($site);
            ConfigService::site($site);
            return true;
        }
        return false;
    }

    /**
     * 模块初始化
     * @return boolean
     */
    protected function moduleInit(): bool
    {
        if ($module = $this->cache()['module']) {
            //缓存站点与模块
            ModuleService::cache($module);
            ConfigService::module(site(), $module);
            return true;
        }
        return false;
    }

    /**
     * 权限检测
     * @return boolean
     */
    protected function verify(): bool
    {
        //超级管理员与站长检测
        if (UserService::isSuperAdmin(Auth::user()) || UserService::isMaster(site(), Auth::user())) return true;
        //管理员检测
        return UserService::isAdmin(site(), Auth::user()) && PermissionService::checkModulePermission(site(), module());
    }
}
