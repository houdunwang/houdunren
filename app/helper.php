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
 * 获取系统配置
 * @param $path
 * @param null $default
 * @return null
 */
function config_system($path, $default = null)
{
    return app(\App\Repositories\ConfigRepository::class)->get($path, $default);
}