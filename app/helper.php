<?php
/**
 * 根据路由设置样式类
 * @return string|null
 */
function route_class()
{
    return str_replace('.', '-', \Route::currentRouteName());
}

/**
 * 获取模块配置项
 * @param $path
 * @param null $default
 * @param string $type
 * @return mixed
 */
function config_get($path, $default = null, $type = 'module')
{
    return app(\App\Repositories\ConfigRepository::class)->get($path, $default, $type);
}

/**
 * 超级管理员检测
 * @return bool
 */
function isSuperAdmin(): bool
{
    return auth()->check() && auth()->user()['id'] == 1;
}