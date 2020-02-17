<?php

namespace App\Http\Middleware;

use Closure;

class SystemAuthMiddleware
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
    if (!auth()->check() || auth()->user()->is_super_admin) {
      abort(403, '需要系统管理员身份');
    }
    return $next($request);
  }
}
