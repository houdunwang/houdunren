<?php

namespace App\Http\Middleware;

use Closure;

/**
 * 后台系统管理中间件
 * Class SystemMiddleware
 */
class SystemMiddleware
{
  /**
   * Handle an incoming request.
   *
   * @param \Illuminate\Http\Request $request
   * @param \Closure $next
   * @return mixed
   */
  public function handle($request, Closure $next)
  {
    if (!auth()->check() || !isSuperAdmin()) {
      abort(403, '需要系统管理员身份');
    }
    return $next($request);
  }
}
