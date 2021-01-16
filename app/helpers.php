<?php

use App\Models\Site;
use Facades\App\Services\Site\SiteService;
use Facades\App\Services\Module\ModuleService;

if (!function_exists('user')) {
    /**
     * 获取用户资料
     *
     * @param mixed $key
     * @return mixed
     */
    // function user(mixed $key = null): mixed
    // {
    //     if (Auth::check()) {
    //         if ($key) return Auth::user()[$key] ?? null;
    //         return Auth::user();
    //     }
    // }
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
        return SiteService::site($site);
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
        return ModuleService::module($name);
    }
}
