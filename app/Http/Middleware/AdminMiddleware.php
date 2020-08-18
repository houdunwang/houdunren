<?php

namespace App\Http\Middleware;

use App\Services\ConfigService;
use App\Services\PermissionService;
use Closure;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        module(module()['name']);

        app(ConfigService::class)->loadSiteConfig();
        app(ConfigService::class)->loadCurrentModuleConfig();

        if (user()->isSuperAdmin || site()->master->user_id === user('id')) {
            return $next($request);
        }

        if (site()->isAdmin(user()) === false) {
            return redirect()->route('admin')->with('danger', '您不是站点管理员');
        }

        $status = app(PermissionService::class)->checkModulePermission(site(), module());
        if ($status === false) {
            return redirect()->route('site.module.index', site())->with('danger', '你没有管理模块的权限，请联系站长给予权限');
        }

        return $next($request);
    }
}
