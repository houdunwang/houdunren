<?php

use App\Models\Site;
use App\Models\User;
use App\Services\ModuleService;
use App\Services\PermissionService;
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
        return site() ? site()['id'] : null;
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
     * @param string $permission
     * @param Site $site
     * @param array $module
     * @return string
     */
    function permission_name(string $permission, Site $site, array $module)
    {
        return app(PermissionService::class)->permissionName($permission, $site, $module);
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
    /**
     * 权限验证
     *
     * @param string $permission
     * @param User $user
     * @param Site $site
     * @param mixed $module
     * @return void
     */
    function access(string $permission, User $user = null, Site $site = null, $module = null)
    {
        $user = $user ?? Auth::user();
        $site = $site ?? site();
        $module = $module ?? module();

        if (!$user || !$site || !$module) {
            return false;
        }
        if (is_super_admin($user) || is_master($user, $site)) {
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

if (!function_exists('is_super_admin')) {
    /**
     * 超级管理员检测
     *
     * @param User $user
     * @return boolean
     */
    function is_super_admin(User $user = null)
    {
        $user = $user ?? Auth::user();
        if ($user) {
            return Auth()->check() && Auth::user()->isSuperAdmin;
        }
        return false;
    }
}

if (!function_exists('is_master')) {
    /**
     * 站点管理员检测
     *
     * @param User $user
     * @param Site $site
     * @return boolean
     */
    function is_master(User $user = null, Site $site = null)
    {
        $site = $site ?? site();
        $user = $user ?? Auth::user();
        if ($user) {
            return is_super_admin($user) || $user['id'] == $site['user_id'];
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
