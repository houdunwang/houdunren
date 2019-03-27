<?php

namespace App\Http\Middleware;

use Closure;

class LoadSiteAndModuleMiddleware
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
        if (!\site(null, true)) {
            abort(404, '站点不存在或域名没有绑定到模块');
        }
        if (!\module(null, true)) {
            abort(404, '您请求的模块不存在');
        }
        return $next($request);
    }
}
