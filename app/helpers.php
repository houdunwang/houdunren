<?php

use App\Models\Module;
use App\Models\Site;
use Facades\App\Services\Site\SiteService;
use Facades\App\Services\Module\ModuleService;

if (!function_exists('site')) {
    /**
     * 当前站点数据
     *
     * @param Site|null $site
     * @return Site|null
     */
    function site(?Site $site = null): ?Site
    {
        return SiteService::cache($site);
    }
}

if (!function_exists('module')) {
    /**
     * 当前模块数据
     *
     * @param string $name
     * @return array|null
     */
    function module(string $name = null): ?Module
    {
        return ModuleService::cache($name);
    }
}

if (function_exists('access')) {
    /**
     * 权限验证
     *
     * @param string $name
     * @return boolean
     */
    function access(string $name): bool
    {
        return \PermissionService::access($name, Auth::user(), site(), module());
    }
}
