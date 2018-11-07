<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Artisan;

//缓存管理
class CacheController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function update()
    {
        //模块缓存
        Artisan::call('hdcms-cache-clear');
        //权限缓存
        app()['cache']->forget('spatie.permission.cache');

        return back()->with('success', '缓存更新成功');
    }
}