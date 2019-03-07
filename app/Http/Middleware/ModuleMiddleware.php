<?php

namespace App\Http\Middleware;

use Closure;

/**
 * 模块后台管理
 * Class ModuleMiddleware
 * @package App\Http\Middleware
 */
class ModuleMiddleware
{
    /**
     * 后台模块
     * @param $request
     * @param Closure $next
     * @param string $permission
     * @return \Illuminate\Http\RedirectResponse|mixed
     * @throws \Exception
     */
    public function handle($request, Closure $next,string $permission='')
    {
        if (!\site(null, true)) {
            abort(404, '站点不存在或域名没有绑定到模块');
        }
        if (!\module(null, true)) {
            abort(404, '您请求的模块不存在');
        }
        if (!site()->user->contains(auth()->user())) {
            return redirect()->route('system.site.index')->with('error', '您没有模块的操作权限');
        }
        module_access(explode('|', $permission), \module(), true);
        return $next($request);
    }
}
