<?php

namespace App\Http\Middleware;

use App\Services\ModuleService;
use App\Services\UserService;
use Closure;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

/**
 * 模块后台中间件
 * Class ModuleAuthMiddleware
 */
class AdminMiddleware
{
    public function handle($request, Closure $next, string $access = null)
    {
        $this->loadSiteAndModule();
        if ($this->checkRole($access)) {
            return $next($request);
        }
        abort(403, '你没有管理站点的权限');
    }

    /**
     * 获取当前用户缓存的站点编号获取站点
     * 并加载模块
     * @return void
     */
    protected function loadSiteAndModule()
    {
        site(request()->query('sid'));
        module(app(ModuleService::class)->getModuleByUrl());
        if (!site() || !module()) {
            throw new Exception('站点或模块不存在');
        }
    }

    /**
     * 角色验证
     * @param mixed $site
     *
     * @return bool
     */
    protected function checkRole($access)
    {
        $isAdmin = app(UserService::class)->isRole(site(), Auth::user(), ['admin']);
        if (isSuperAdmin() || $isAdmin)
            return true;

        return $access && access($access, site(), Auth::user());
    }
}
