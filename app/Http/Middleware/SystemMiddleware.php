<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use UserService;

/**
 * 系统中间件
 * @package App\Http\Middleware
 */
class SystemMiddleware
{
    public function handle($request, Closure $next)
    {
        if (!UserService::isSuperAdmin(Auth::user())) {
            abort(403, '你不是超级管理员，没有操作权限');
        }

        return $next($request);
    }
}
