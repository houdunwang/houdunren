<?php

namespace App\Http\Middleware;

use Closure;

class SystemMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!auth()->user()->isSuperAdmin()) {
            return redirect()->route('admin')->with('error', '您不是超级管理站不允许执行此操作');
        }
        return $next($request);
    }
}
