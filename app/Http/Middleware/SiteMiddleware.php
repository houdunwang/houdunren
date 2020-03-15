<?php

namespace App\Http\Middleware;

use App\Services\UserService;
use App\Models\Site;
use Closure;

/**
 * 后台站点管理中间件
 * Class SiteMiddleware
 */
class SiteMiddleware
{
  public function handle($request, Closure $next, ...$role)
  {
    $site = site(request('site'));
    config(['site' => site()['config']]);
    if (auth()->check()) {
      if ($this->checkRole($role, $site) || isSuperAdmin()) {
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
  protected function checkRole(array $role, Site $site): bool
  {
    $user = auth()->user();
    return isSuperAdmin() ||
      app(UserService::class)->isRole($site, $user, $role);
  }
}
