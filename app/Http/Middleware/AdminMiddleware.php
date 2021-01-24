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
use App\Models\Module;

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
        if ($this->init() &&  $this->verify()) {
            $this->inertia();
            return $next($request);
        }
        return redirect()->route('admin')->with('message', $this->error);
    }

    /**
     * 初始化站点与模块
     *
     * @return boolean|null
     */
    protected function init(): bool
    {
        if (session('site_id') && session("module_id")) {
            $site = Site::findOrFail(session('site_id'));
            $module = Module::findOrFail(session('module_id'));
            SiteService::site($site);
            ModuleService::module($module);

            //加载配置
            ConfigService::site($site);
            ConfigService::module($site, $module);
            return true;
        }
        return false;
    }

    /**
     * 权限检测
     *
     * @return boolean
     */
    protected function verify(): bool
    {
        if (!Auth::check()) return false;
        //超级管理员与站站检测
        if (UserService::isSuperAdmin() || UserService::isMaster()) return true;
        //管理员检测
        return UserService::isAdmin(Auth::user()) && PermissionService::checkModulePermission(site(), module());
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
            'menus' => MenuService::currentUserMenus()
        ]);
    }
}
