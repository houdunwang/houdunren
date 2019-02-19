<?php

namespace App\Http\Middleware;

use App\Models\Module;
use Closure;

class ModuleMiddleware
{
    public function handle($request, Closure $next)
    {
        if (!\site()) {
            abort(404, '您访问的站点不存在');
        }
        if ($mid = request()->query('mid')) {
            cache()->forever('cache_admin_s' . site()['id'] . '_module', Module::findOrFail($mid));
        }
        if (!\module()) {
            abort(404, '您请求的模块不存在');
        }
        return $next($request);
    }
}
