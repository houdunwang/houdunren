<?php

namespace App\Http\Middleware;

use App\Services\UserService;
use Closure;

/**
 * 后台站点管理中间件
 * Class SiteMiddleware
 */
class SiteMiddleware
{
  public function handle($request, Closure $next, ...$role)
  {
    if (auth()->check()) {
      if ($this->checkRole($role) || isSuperAdmin()) {
        return $next($request);
      }
    }
    config(['site' => site()['config']]);
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
    return isSuperAdmin() ||
      app(UserService::class)->isRole($site, $user, $role);
  }
}
