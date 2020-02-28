<?php

namespace App\Http\Middleware;

use App\Servers\UserServer;
use Closure;

class ModuleAuthMiddleware
{
  public function handle($request, Closure $next)
  {
    $site = site(request('site'));
    $check =  $site && auth()->check()
      && app(UserServer::class)->isRole($site, auth()->user());

    if ($check) {
      return $next($request);
    }
    abort(403, '你没有管理站点的权限');
  }
}
