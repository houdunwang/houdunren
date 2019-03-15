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
        //维护检测
        if (config_get('close.state', false, 'site')) {
            if (!site()->isManage(auth()->user()) && !is_super_admin()) {
                return \Route::respondWithRoute('site.close');
            }
        }
        //头像验证
        if (config_get('user.validate_icon', false, 'site')) {
            if (auth()->check() && auth()->user()['icon'] == '') {
                return redirect()->route('member.icon.index')->with('info', '你需要先设置头像');
            }
        }
        if (auth()->check()) {
            auth()->user()->touch();
        }
        return $next($request);
    }
}
