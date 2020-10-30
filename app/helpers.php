<?php

use App\Models\Module;
use App\Models\Site;
use App\Services\ModuleService;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Exception\SuspiciousOperationException;

/**
 * 根据路由生成CSS样式类
 * @return string|null
 */
function route_class()
{
  return str_replace('.', '-', Route::currentRouteName());
}

/**
 * 当前用户资料
 * @param string $key 用户表字段
 * @return mixed
 * @throws LogicException
 */
function user($key = '')
{
  $user = Auth::user();
  if ($user) {
    return $key ? $user[$key] : $user;
  }
}

/**
 * 当前站点编号
 * @return mixed
 * @throws BindingResolutionException
 * @throws LogicException
 */
function site_id()
{
  return site()['id'] ?? null;
}


/**
 * 当前站点数据
 * @param Site|null $site
 * @return null|Site
 * @throws BindingResolutionException
 */

function site(Site $site = null): ?Site
{
  $site_id = null;
  if (is_null($site)) {
    $site_id = session('site_id');
  }

  if ($site instanceof Site) {
    session(['site_id' => $site['id']]);
  }

  return $site_id ? Site::find($site_id) : null;
}

/**
 * 当前模块数据
 * @param string|null $name
 * @return mixed
 * @throws BindingResolutionException
 */
function module(string $name = null)
{
  $module_name = null;

  if (is_null($name)) {
    $module_name = session('module_name');
  }

  if (!is_null($name)) {
    $module_name = $name;
    session(['module_name' => $name]);
  }

  if (!Module::where('name', $module_name)->exists()) {
    abort(404, '模块不存在');
  }

  return $module_name ? app(ModuleService::class)->find($module_name) : null;
}

/**
 * 权限完成标识
 * @param mixed $permission
 * @param Site $site
 * @param mixed $module
 * @return string
 */
function permission_name($permission, Site $site, $module)
{
  return 's' . $site->id . '-' . $module['name'] . '-' . $permission;
}

/**
 * 权限验证
 * @param mixed $permission
 * @param Site|null $site
 * @param mixed|null $module
 * @return mixed
 * @throws BindingResolutionException
 * @throws LogicException
 */
function access($permission, Site $site = null, $module = null)
{
  $site = $site ?? site();
  $module = $module ?? module();
  if (Auth::check() === false) {
    return false;
  }
  if (user()->isSuperAdmin || $site->user_id == user('id')) {
    return true;
  }

  return user()->can(permission_name($permission, $site, $module));
}

/**
 * 根据域名获取站点
 * @return mixed
 * @throws BindingResolutionException
 * @throws SuspiciousOperationException
 */
function get_site_by_domain()
{
  $info = parse_url(request()->url());
  return Site::where('domain', 'regexp', 'https?:\/\/' . $info['host'])->firstOrFail();
}

/**
 * 站点管理员检测
 * @return bool
 * @throws LogicException
 * @throws BindingResolutionException
 */
function is_master()
{
  if (Auth::check()) {
    return user()['isSuperAdmin'] || user()->user_id == site()['user_id'];
  }
  return false;
}

/**
 * 客户端是否是微信客户端
 * @return bool
 */
function is_wechat()
{
  return isset($_SERVER['HTTP_USER_AGENT']) && strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger') !== false;
}
