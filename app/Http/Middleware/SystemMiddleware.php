<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Config;
use Illuminate\Support\Facades\Auth;

/**
 * 系统中间件
 */
class SystemMiddleware
{
    public function handle($request, Closure $next)
    {
        if (!user()->isSuperAdmin) {
            return back()->with('message', '你没有操作权限');
        }
        return $next($request);
    }
}
