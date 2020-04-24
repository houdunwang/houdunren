<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

/**
 * 网站主页
 * Class IndexController
 */
class HomeController extends Controller
{
    /**
     * 网站首页访问
     * 转向到模块主页控制器
     * @return mixed
     */
    public function index()
    {
        $module = module();
        $class = "Modules\\{$module['name']}\Http\Controllers\Front\HomeController";;
        return app($class)->index();
    }
}
