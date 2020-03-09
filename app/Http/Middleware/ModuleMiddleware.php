<?php

namespace App\Http\Middleware;

use App\Services\SiteServer;
use App\Services\UserService;
use Closure;
use Illuminate\Support\Facades\Cache;

/**
 * 模块后台中间件
 * Class ModuleAuthMiddleware
 */
class ModuleMiddleware
{
  public function handle($request, Closure $next, string $access = null)
  {
    $sid = $this->getCacheSiteId();
    if (!$sid) {
      abort('404', '站点不存在');
    }

    if ($this->checkRole(site($sid), $access)) {
      return $next($request);
    }

    abort(403, '你没有管理站点的权限');
  }

  /**
   * 获取当前用户缓存的站点编号
   * @return void
   */
  protected function getCacheSiteId()
  {
    $name = auth()->id() . '-sid';
    $sid =  request()->query('sid', Cache::get($name));
    if ($sid) {
      Cache::put($name, $sid);
    }
    return $sid;
  }

  /**
   * 角色验证
   * @param mixed $site
   *
   * @return bool
   */
  protected function checkRole($site, $access)
  {
    if (
      isSuperAdmin() ||
      app(UserService::class)->isRole($site, auth()->user(), ['admin'])
    ) {
      return true;
    }
    if ($access && access($access, $site, auth()->user())) {
      return true;
    }
    return false;
  }
}
