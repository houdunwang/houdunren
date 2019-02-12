<?php
/**
 * 根据路由设置样式类
 * @return string|null
 */
function route_class()
{
    return str_replace('.','-',\Route::currentRouteName()) ;
}