<?php

namespace App\Http\Middleware;

use Closure;

/**
 * 会员前台
 * Class FrontMiddleware
 * @package App\Http\Middleware
 */
class FrontMiddleware
{
    /**
     * @param $request
     * @param Closure $next
     * @return mixed
     * @throws \App\Exceptions\ResponseHttpException
     */
    public function handle($request, Closure $next)
    {
        if (!\site(null, true)) {
            abort(404, '站点不存在或域名没有绑定到模块');
        }
        if (!\module(null, true)) {
            abort(404, '您请求的模块不存在');
        }
        if (config_get('close.state', false, 'site')) {
            if (site()->isManage(auth()->user())) {
                return \Route::respondWithRoute('site.close');
            }
        }
        return $next($request);
    }
}
