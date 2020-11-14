<?php

use App\Models\Module;
use App\Models\Site;
use App\Services\ModuleService;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Exception\SuspiciousOperationException;


if (!function_exists('route_class')) {
  /**
   * 根据路由生成CSS样式类
   * @return string|null
   */
  function route_class()
  {
    return str_replace('.', '-', Route::currentRouteName());
  }
}
if (!function_exists('user')) {
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
}

if (!function_exists('site_id')) {
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
}

if (!function_exists('site')) {
  /**
   * 当前站点数据
   * @param Site|null $site
   * @return null|Site
   * @throws BindingResolutionException
   */
  function site(?Site $site = null): ?Site
  {
    static $cache = null;

    if ($cache) return $cache;

    if ($site) {
      session(['site_id' => $site['id']]);
    }

    if ($id = session('site_id')) {
      $cache = Site::find($id);
    };

    return $cache;
  }
}

if (!function_exists('module')) {
  /**
   * 当前模块数据
   * @param string|null $name
   * @return mixed
   * @throws BindingResolutionException
   */
  function module(string $name = null)
  {
    static $cache = null;

    if ($cache) return $cache;

    if ($name) {
      session(['module_name' => $name]);
    }

    if ($name = session('module_name')) {
      $cache = app(ModuleService::class)->find($name);
    }

    return $cache;
  }
}

if (!function_exists('permission_name')) {
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
}

if (!function_exists('access')) {
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
}

if (!function_exists('get_site_by_domain')) {
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
}

if (!function_exists('is_master')) {
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
}

if (!function_exists('is_wechat')) {
  /**
   * 客户端是否是微信客户端
   * @return bool
   */
  function is_wechat()
  {
    return isset($_SERVER['HTTP_USER_AGENT']) && strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger') !== false;
  }
}
