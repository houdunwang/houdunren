<?php
/**
 * 当前访问是否为指定路由前缀
 * 用于后台菜单列表展示
 * @param $name
 * @return bool
 */
function routePrefixCheck($name)
{
    return \Route::current()->getPrefix() == '/' . $name;
}

/**
 * 获取配置项
 * @param $path
 * @return mixed
 */
function hd_config($path)
{
    $info = explode('.', $path);
    $name = array_shift($info);
    $cache = Cache::get('hd_config', function () {
        return \App\Models\Config::pluck('data', 'name');
    });
    return $cache[$name][$info[0]] ?? null;
}

/**
 * 生成随机数值
 * @param $num
 * @return string
 */
function hd_random($num)
{
    $str = '';
    for ($i = 0; $i < $num; $i++) {
        $str .= substr(mt_rand(1, 999), 0, 1);
    }
    return $str;
}

function hd_menu_class($id, $class = 'show')
{
    return \Cookie::get('admin_menu_id') == $id ? $class : '';
}

function hd_route_class()
{
    return str_replace('.', '-', Route::currentRouteName());
}

function hd_model($name, $id = null)
{
    if (strpos($name, '-')) {
        $class = '\\' . str_replace('-', '\\', $name);
    } else {
        $class = '\App\Models\\' . ucfirst($name);
    }
    return $id ? $class::find($id) : $class;
}
