<?php

namespace App\Http\Middleware;

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
   * 站点角色检测
   * @param array $role
   *
   * @return bool
   */
  protected function checkRole(array $role): bool
  {
    $site = site(request('site'));
    $user = auth()->user();

    return  isSuperAdmin() ||
      app(UserServer::class)->isRole($site, $user, $role);
  }
}
