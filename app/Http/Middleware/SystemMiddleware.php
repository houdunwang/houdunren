<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use UserService;

/**
 * 系统中间件
 */
class SystemMiddleware
{
    public function handle($request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        if (Auth::check() && UserService::isSuperAdmin()) {
            return back()->with('message', '你没有操作权限');
        }

        return $next($request);
    }
}
