<?php

namespace App\Http\Middleware;

use PermissionService;
use App\Models\Site;
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
        $this->init();
        if ($this->check()) {
            return $next($request);
        }
        abort(403, '你没有操作权限');
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
        $module = ModuleService::getByDomain() ?: abort(404);
        ModuleService::cache($module);
        ConfigService::module($site, $module);
    }

    /**
     * 站点
     * @return Site
     */
    protected function site(): Site
    {
        $site = request('site');
        if (is_numeric($site)) {
            $site = Site::findOrFail($site);
        }
        return $site ?: abort(404);
    }

    /**
     * 权限检测
     * @return boolean
     */
    protected function check(): bool
    {
        //站点模块检测
        if (!ModuleService::siteModules(site())->contains('name', module()['name'])) {
            return false;
        }
        //超级管理员与站长检测
        if (Auth::user()->isSuperAdmin || UserService::isMaster(site(), Auth::user())) {
            return true;
        }
        //管理员检测
        return UserService::isAdmin(site(), Auth::user())
            && PermissionService::checkModulePermission(site(), module());
    }
}
