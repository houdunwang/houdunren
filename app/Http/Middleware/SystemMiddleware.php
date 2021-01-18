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
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        if (!UserService::isSuperAdmin()) {
            return back()->with('message', '你没有操作权限');
        }

        return $next($request);
    }
}
