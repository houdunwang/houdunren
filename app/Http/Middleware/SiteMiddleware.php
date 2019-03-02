<?php

namespace App\Http\Middleware;

use App\Models\Domain;
use App\Models\Module;
use App\Models\Site;
use Closure;

/**
 * 加载站点模块数据
 * Class SiteMiddleware
 * @package App\Http\Middleware
 */
class SiteMiddleware
{
    public function handle($request, Closure $next)
    {
        $sid = request('sid', Domain::firstOrNew(['name' => host()])['site_id'] ?? 0);
        if (!$site = Site::find($sid)) {
            abort(404, '站点不存在或域名没有绑定到模块');
        }

        $mid = request('mid', Domain::firstOrNew(['name' => host()])['module_id']);
        if (!$module = Module::find($mid)) {
            abort(404, '您请求的模块不存在');
        }
        \site($site) && \module($module);
        config(['app.name' => \site()['name']]);
//        if ($user = auth()->user()) {
//            if (!$user->sites->contains(\site())) {
//                dd(3);
//            }
//        }
        return $next($request);
    }
}
