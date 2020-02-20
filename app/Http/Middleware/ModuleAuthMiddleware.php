<?php

namespace App\Http\Middleware;

use App\Models\Site;
use Closure;

class ModuleAuthMiddleware
{
  public function handle($request, Closure $next)
  {
    $site = request('site');
    $model = site(is_numeric($site) ? Site::find($site) : $site);
    if (auth()->check() && $model) {
      return $next($request);
    }
    abort(403, '你没有管理站点的权限');
  }
}
