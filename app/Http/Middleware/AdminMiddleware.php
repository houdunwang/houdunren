<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Inertia\Inertia;
use UserService;
use ConfigService;
use ModuleService;
use PermissionService;

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
        if ($this->verify() === false) {
            return redirect()->route('admin')->with('message', $this->error);
        }

        $this->loadConfig();
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
        Inertia::setRootView('module');
        //分配共享数据
        Inertia::share('admin', [
            'site' => site()->select('id', 'title', 'created_at')->first(),
            'module' => module(),
            'modules' => ModuleService::getSiteModules(site())
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
        return UserService::isAdmin(user()) && PermissionService::checkModulePermission(site(), module());
    }
    /**
     * 加载配置
     *
     * @return void
     */
    protected function loadConfig()
    {
        ConfigService::site();
        ConfigService::module();
    }
}
