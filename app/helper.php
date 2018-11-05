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
 * 保存模块配置项
 * @param array $data
 * @return bool
 */
function config_save(array $data)
{
    $module = strtolower(module_name());
    return \App\Models\Config::updateOrCreate(
        ['module' => $module],
        ['module' => $module, 'data' => $data,]
    )->save();
}

/**
 * 获取模块配置项
 * @param $path
 * @param null $default
 * @return null
 */
function config_get($path, $default = null)
{
    $cache = Cache::rememberForever('config', function () {
        return \App\Models\Config::pluck('data', 'module');
    });
    return array_get($cache, $path) ?? $default;
}

/**
 * 获取模块菜单
 * @param string $name 菜单类型
 * @return mixed
 */
function module_menus(string $name)
{
    return \App\Models\Module::whereNotNull($name)->pluck($name, 'name');
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
 * 获取模块命名空间
 * @param $module
 * @return string
 */
function module_namespace($module)
{
    $system = \App\Models\Module::where('name', $module)->value('system');
    if ($system) {
        return '\App\Http\Controllers\\' . $module;
    }
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

/**
 * 根据路由获取模块标识
 * @return array
 */
function module_name()
{
    $info = explode('/', Route::getCurrentRoute()->uri);
    return $info[0] ? \App\Models\Module::where('name', $info[0])->value('name') : null;
}

/**
 * 获取后台菜单列表
 * @return mixed
 */
function module_admin_menus()
{
    $name = explode('/', Route::getCurrentRoute()->uri);
    return \App\Models\Module::where(['name' => $name[0]])->first()->adminMenus();
}
