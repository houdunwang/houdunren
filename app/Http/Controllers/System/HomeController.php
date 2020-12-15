<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use App\Models\Site;
use Illuminate\Http\Request;

/**
 * 后台系统主页
 * @package App\Http\Controllers\System
 */
class HomeController extends Controller
{
    /**
     * 系统管理菜单列表页
     *
     * @return void
     */
    public function index()
    {
        return inertia()->render('System/Home/Index');
    }
}
