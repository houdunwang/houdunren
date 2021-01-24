<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * 模块前台主页入口
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{
    /**
     * 模块前台首页
     *
     * @param Request $request
     * @return void
     */
    public function index(Request $request)
    {
        if (module()) {
            $class = 'Modules\\' . site()->module['name'] . '\Http\Controllers\Front\HomeController';
            return app($class)->index($request);
        }
    }
}
