<?php

namespace App\Http\Middleware;

use App\Models\Site;
use App\Servers\UserServer;
use Closure;

class SiteAuthMiddleware
{
  public function handle($request, Closure $next, ...$role)
  {
    if (auth()->check()) {
      if ($this->checkRole($role) || isSuperAdmin()) {
        return $next($request);
      }
    }
    abort(403, '你不是站点管理员或超级管理员');
  }

  /**
   * 获取访问站点
   * @return void
   */
  protected function getSite()
  {
    $site = request('site');
    $model = site(is_numeric($site) ? Site::find($site) : $site);
    if (!$model) {
      abort(404, '你访问的站点不存在');
    }
    return $model;
  }

  /**
   * 站点角色检测
   * @param array $role
   * 
   * @return bool
   */
  protected function checkRole(array $role): bool
  {
    $site = $this->getSite();
    return  isSuperAdmin() ||
      app(UserServer::class)->isRole($site, auth()->user(), $role);
  }
}
