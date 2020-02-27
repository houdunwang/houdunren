<?php

namespace App\Http\Middleware;

use App\Models\Site;
use Closure;

class SiteAuthMiddleware
{
  public function handle($request, Closure $next)
  {
    $site = request('site');
    $model = site(is_numeric($site) ? Site::find($site) : $site);

    if (auth()->check() && $model) {
      if ($model['user_id'] === auth()->id() || isSuperAdmin()) {
        return $next($request);
      }
    }
    abort(403, '你不是站点管理员或超级管理员');
  }
}
