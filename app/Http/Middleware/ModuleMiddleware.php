<?php

namespace App\Http\Middleware;

use App\Models\Module;
use Closure;

class ModuleMiddleware
{
    public function handle($request, Closure $next)
    {
        if ($mid = request()->query('mid')) {
            cache()->forever('cache_module', Module::findOrFail($mid));
        }
        //站点或模块不存在时禁止访问
        if (!\site() || !\module()) {
            abort(404, '请求页面不存在');
        }
        return $next($request);
    }
}
