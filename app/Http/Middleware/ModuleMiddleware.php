<?php

namespace App\Http\Middleware;

use App\Services\ModuleService;
use App\Services\UserService;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

/**
 * 模块后台中间件
 * Class ModuleAuthMiddleware
 */
class ModuleMiddleware
{
  public function handle($request, Closure $next, string $access = null)
  {
    $this->loadSiteAndModule();
    if ($this->checkRole($access)) {
      return $next($request);
    }
    abort(403, '你没有管理站点的权限');
  }

  /**
   * 获取当前用户缓存的站点编号获取站点
   * 并加载模块
   * @return void
   */
  protected function loadSiteAndModule()
  {
    $name = Auth::id() . '-sid';
    $sid =  request()->query('sid', Cache::get($name));
    if (site($sid)) Cache::put($name, $sid);

    //本次请求模块
    $module = app(ModuleService::class)->getModuleByUrl();
    module($module);
  }

  /**
   * 角色验证
   * @param mixed $site
   *
   * @return bool
   */
  protected function checkRole($access)
  {
    $isAdmin = app(UserService::class)->isRole(site(), auth()->user(), ['admin']);
    if (isSuperAdmin() || $isAdmin)
      return true;

    return $access && access($access, site(), auth()->user());
  }
}
