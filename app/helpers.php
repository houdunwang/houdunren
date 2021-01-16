<?php

use App\Models\Site;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Services\ModuleService;
use App\Services\PermissionService;
use App\Services\SiteService;
use App\Services\UserService;

if (!function_exists('user')) {
    /**
     * 当前用户资料
     *
     * @param string $key
     * @return User|null
     */
    function user($key = ''): ?User
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
     *
     * @return Site|null
     */
    function site_id(): ?Site
    {
        return site() ? site()['id'] : null;
    }
}

if (!function_exists('site')) {
    /**
     * 当前站点数据
     *
     * @param Site|null $site
     * @return Site|null
     */
    function site(?Site $site = null): ?Site
    {
        $d = \Site::site();
        dd($d);
        // return app(SiteService::class)->site($site);
    }
}

if (!function_exists('module')) {
    /**
     * 当前模块数据
     *
     * @param string $name
     * @return array|null
     */
    function module(string $name = null): ?array
    {
        return app(ModuleService::class)->module($name);
    }
}

// if (!function_exists('permission_name')) {
//     /**
//      * 权限标识名称
//      *
//      * @param string $permission
//      * @param Site $site
//      * @param array $module
//      * @return string
//      */
//     function permission_name(string $permission, Site $site, array $module): string
//     {
//         return app(PermissionService::class)->permissionName($permission, $site, $module);
//     }
// }

// if (!function_exists('access')) {
//     /**
//      * 权限验证
//      *
//      * @param string $permission
//      * @param User $user
//      * @param Site $site
//      * @param array $module
//      * @return boolean
//      */
//     function access(string $permission, User $user = null, Site $site = null, array $module = null): bool
//     {
//         return app(PermissionService::class)->access($permission, $user, $site, $module);
//     }
// }
