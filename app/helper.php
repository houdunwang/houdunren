<?php
/**
 * 当前访问是否为指定路由前缀
 * 用于后台菜单列表展示
 * @param $name
 * @return bool
 */
function routePrefixCheck($name)
{
    return \Route::current()->getPrefix() == '/'.$name;
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
    $config = \App\Models\Config::where('name', $name)->value('data');
    return array_get($config, implode('.', $info));
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
