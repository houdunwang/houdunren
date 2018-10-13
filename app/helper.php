<?php
/** .-------------------------------------------------------------------
 * |  Software: [hdcms framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军 <www.aoxiangjun.com>
 * |    WeChat: houdunren2018
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/
/**
 * 当前访问是否为指定路由前缀
 * 用于后台菜单列表展示
 * @param $name
 * @return bool
 */
//function routePrefixCheck($name)
//{
//    return \Route::current()->getPrefix() == '/' . $name;
//}

/**
 * 获取配置项
 * @param $path
 * @return mixed
 */
function system_config($path)
{
    $info = explode('.', $path);
    $name = array_shift($info);
    $cache = Cache::get('system_config', function () {
        return \App\Models\Config::pluck('data', 'name');
    });
    return count($info) == 0 ? $cache[$name] : $cache[$name][$info[0]] ?? null;
}

/**
 * 获取模块配置项
 * @param $path
 * @return null
 */
function module_config($path)
{
    $info = explode('.', $path);
    $name = array_shift($info);
    $cache = Cache::get('module_config', function () {
        return \App\Models\ModuleConfig::pluck('data', 'name');
    });
    return count($info) == 0 ? $cache[$name] : $cache[$name][$info[0]] ?? null;
}

/**
 * 生成随机数值
 * @param $num
 * @return string
 */
function random_number($num)
{
    $str = '';
    for ($i = 0; $i < $num; $i++) {
        $str .= substr(mt_rand(1, 999), 0, 1);
    }
    return $str;
}

//function hd_menu_class($id, $class = 'show')
//{
//    return \Cookie::get('admin_menu_id') == $id ? $class : '';
//}

/**
 * 根据路由生成样式类名
 * @return mixed
 */
function route_class()
{
    return str_replace('.', '-', Route::currentRouteName());
}

/**
 * 生成模型实例
 * @return mixed
 */
function model_instance()
{
    $name = Request::query('model');
    if (!strpos($name, '-')) {
        $name = 'App-Models-' . $name;
    }
    $id = Request::query('id');
    $class = '\\' . str_replace('-', '\\', $name);
    return $class::find($id);
}

/**
 * 验证权限
 * @param $permission
 * @param null $user
 * @return bool
 * @throws \App\Exceptions\PermissionException
 */
function access($permission, $user = null)
{
    $permission = is_array($permission) ? $permission : [$permission];
    $user = $user ?? auth()->user();
    if (!$user || !$user->hasAllPermissions($permission)) {
        throw new \App\Exceptions\PermissionException('没有访问权限');
    }
    return true;
}
