<?php

use App\Models\Module;
use App\Models\Site;
use Facades\App\Services\Site\SiteService;
use Facades\App\Services\Module\ModuleService;

if (!function_exists('site')) {
    /**
     * 站点缓存与获取
     * @param mixed|null $name
     * @return mixed
     */
    function site($name = null)
    {
        if (is_string($name)) {
            $site = SiteService::cache();
            return $site[$name] ?? null;
        }
        return SiteService::cache();
    }
}

if (!function_exists('module')) {
    /**
     * 获取模块数据
     * @param mixed|null $name
     * @return mixed
     */
    function module($name = null)
    {
        if (is_string($name)) {
            $module = ModuleService::cache();
            return $module[$name] ?? null;
        }
        return ModuleService::cache();
    }
}

if (!function_exists('access')) {
    /**
     * 权限验证
     *
     * @param string $name
     * @return boolean
     */
    function access(string $name = null): bool
    {
        //超级管理员与站长检测
        if (UserService::isMaster(site(), Auth::user())) {
            return true;
        }
        //管理员检测
        if ($name) {
            return \PermissionService::access($name, Auth::user(), site(), module());
        }
        return false;
    }
}


if (!function_exists('markdown')) {
    /**
     * 转换markdown
     * @param string $content
     * @return mixed
     */
    function markdown(string $content)
    {
        $Parsedown = new \Parsedown();
        return $Parsedown->text($content);
    }
}

if (!function_exists('is_master')) {
    /**
     * 站长检测
     * @return boolean
     */
    function is_master(): bool
    {
        return \UserService::isMaster(site(), \Auth::user());
    }
}
