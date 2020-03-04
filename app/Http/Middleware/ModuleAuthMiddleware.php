<?php

namespace App\Http\Middleware;

use App\Servers\ModuleServer;
use App\Servers\SiteServer;
use App\Servers\UserServer;
use Closure;

/**
 * 模块中间件
 * Class ModuleAuthMiddleware
 */
class ModuleAuthMiddleware
{
  public function handle($request, Closure $next)
  {
    $site = site(app(SiteServer::class)->getByUrl());

    if ($site && $this->checkRole($site)) {
      return $next($request);
    }

    abort(403, '你没有管理站点的权限');
  }

  /**
   * 角色验证
   * @param mixed $site
   *
   * @return bool
   */
  protected function checkRole($site)
  {
    return app(UserServer::class)->isRole($site, auth()->user());
  }
}
