<?php

namespace App\Http\Middleware;

use App\Services\ModuleService;
use App\Services\PermissionService;
use Closure;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $this->cacheModule();
        $status = app(PermissionService::class)->checkModulePermission(module());

        if ($status === false) {
            return redirect()->route('admin')->with('danger', '你没有管理模块的权限');
        }

        return $next($request);
    }

    public function cacheModule()
    {
        $module = app(ModuleService::class)->findBySite(site(), module()['name']);
        unset($module['model']);
        module($module);
    }
}
