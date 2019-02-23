<?php

namespace App\Http\Middleware;

use App\Models\Module;
use App\Repositories\ModuleRepository;
use App\Repositories\SiteRepository;
use Closure;

class ModuleMiddleware
{
    public function handle($request, Closure $next)
    {
        if (!\site()) {
            abort(404, '您访问的站点不存在');
        }
        if ($mid = request()->query('mid')) {
            (new ModuleRepository())->cacheModule(site(), Module::findOrFail($mid));
        }
        if (!\module()) {
            abort(404, '您请求的模块不存在');
        }
        if (!site()->user->contains(auth()->user())) {
            return redirect()->route('site.site.index')->with('error', '您没有模块的操作权限');
        }
        return $next($request);
    }
}
