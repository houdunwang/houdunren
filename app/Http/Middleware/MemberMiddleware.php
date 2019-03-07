<?php

namespace App\Http\Middleware;

use Closure;

class MemberMiddleware
{
    /**
     * 会员中心
     * @param $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }
        if (!\site(null, true)) {
            abort(404, '站点不存在或域名没有绑定到模块');
        }
        return $next($request);
    }
}
