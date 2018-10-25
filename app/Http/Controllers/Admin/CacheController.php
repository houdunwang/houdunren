<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
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
        //更新模块缓存
        Artisan::call('hd-module');
        //更新权限缓存
        app()['cache']->forget('spatie.permission.cache');
        return back()->with('success', '缓存更新成功');
    }
}
