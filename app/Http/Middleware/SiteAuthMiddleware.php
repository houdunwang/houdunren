<?php

namespace App\Http\Middleware;

use Closure;

class SiteAuthMiddleware
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
    $site = site(request('site'));
    if (auth()->check() && $site) {
      if ($site['user_id'] === auth()->id() || isSuperAdmin()) {
        return $next($request);
      }
    }
    abort(403, '你不是站点管理员或超级管理员');
  }
}
