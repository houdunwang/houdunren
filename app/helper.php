<?php
/**
 * 保存模块配置项
 * @return mixed
 */
function config_save(array $data)
{
    return app()->call('\App\Repositories\ConfigRepository@save', ['data'=>$data]);
}

/**
 * 获取模块配置项
 * @param $path
 * @param null $default
 * @return null
 */
function config_get($path, $default = null)
{
    return app(\App\Repositories\ConfigRepository::class)->get($path, $default);
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
 * 获取模型实例
 * @param string $dash 连接符
 * @return mixed
 */
function model_instance(string $dash = '-')
{
    $model = Request::query('model');
    $id = Request::query('id');
    if (!strpos($model, $dash)) {
        $model = 'App-Models-' . $model;
    }
    $class = '\\' . str_replace($dash, '\\', $model);
    return $class::find($id);
}

/**
 * 获取模块命名空间
 * @param $module
 * @return string
 */
function module_namespace($module)
{
    return app(\App\Repositories\ModuleRepository::class)->getNamespace($module);
}

/**
 * 根据路由获取模块标识
 * @return array
 */
function module_name_from_url()
{
    return app(\App\Repositories\ModuleRepository::class)->getNameFromUrl();
}

/**
 * 获取所有模块菜单
 * @param string $name 菜单类型:center_menu
 * @return mixed
 */
function menus(string $name)
{
    return app(\App\Repositories\ModuleRepository::class)->allMenus($name);
}

/**
 * 获取后台菜单列表
 * @param string $module 模块标识
 * @param string $type
 * @return mixed
 */
function module_menu(string $module, $type = 'admin_menu')
{
    return app(\App\Repositories\ModuleRepository::class)->menu($module, $type);
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