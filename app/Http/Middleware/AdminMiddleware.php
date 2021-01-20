<?php

namespace App\Http\Middleware;

use App\Models\Site;
use Closure;
use Inertia\Inertia;
use UserService;
use ConfigService;
use ModuleService;
use SiteService;
use PermissionService;
use Auth;
use MenuService;

/**
 * 模块后台管理中间件
 * @package App\Http\Middleware
 */
class AdminMiddleware
{
    //错误提示信息
    protected $error = '你没有管理模块的权限，请联系站长给予权限';

    public function handle($request, Closure $next)
    {
        if ($this->init() && $this->verify() === false) {
            return redirect()->route('admin')->with('message', $this->error);
        }

        $this->inertia();
        return $next($request);
    }

    /**
     * Inertia初始化
     *
     * @return void
     */
    protected function inertia()
    {
        Inertia::setRootView('admin');
        //分配共享数据
        Inertia::share('admin', [
            'site' => site()->select('id', 'title', 'created_at')->first(),
            'module' => module(),
            'modules' => ModuleService::getSiteModules(site()),
            'menus' => MenuService::getUserAdminMenus()
        ]);
    }

    /**
     * 权限检测
     *
     * @return boolean
     */
    protected function verify(): bool
    {
        //环境检测
        if (!Auth::check() || !site() || !module()) return false;
        //超级管理员与站站检测
        if (UserService::isSuperAdmin() || UserService::isMaster()) return true;
        //管理员检测
        return UserService::isAdmin(Auth::user()) && PermissionService::checkModulePermission(site(), module());
    }

    /**
     * 初始化站点与模块
     *
     * @return boolean|null
     */
    protected function init(): ?bool
    {
        if (session('site_id') && session("module_name")) {
            SiteService::site(Site::find(session('site_id')));
            ModuleService::module(session('module_name'));

            //加载配置
            ConfigService::site();
            ConfigService::module();
            return true;
        }
    }
}
