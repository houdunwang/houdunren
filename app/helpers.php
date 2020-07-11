<?php

use App\Models\Module;
use App\Models\Site;
use App\Services\ModuleService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

function route_class()
{
    return str_replace('.', '-', Route::currentRouteName());
}

function user($key = '')
{
    $user = Auth::user();
    if ($user) {
        return $key ? $user[$key] : $user;
    }
}

function site(Site $site = null): ?Site
{
    if ($site instanceof Site) {
        session(['site' => $site]);
    }

    if (is_null($site)) {
        $site = session('site');
    }

    if (!($site instanceof Site)) {
        abort(404, '站点不存在');
    }

    return $site;
}

function module(array $module = null)
{
    if (!is_null($module)) {
        session(['module' => $module]);
    }

    if (is_null($module)) {
        $module = session('module');
    }

    if (empty($module)) {
        abort(404, '模块不存在');
    }

    return $module;
}

function permission_name($permission, Site $site, $module)
{
    return 's' . $site->id . '-' . $module['name'] . '-' . $permission;
}

//只在模块应用使用
function access($permission, $site = null, $module = null)
{
    $site = $site ?? site();
    $module = $module ?? module();

    if (user()->isSuperAdmin || $site->user_id == user('id')) {
        return true;
    }

    return user()->can(permission_name($permission, $site, $module));
}
