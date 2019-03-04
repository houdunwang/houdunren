<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * 系统安装
 * Class InstallController
 * @package App\Http\Controllers
 */
class InstallController extends Controller
{
    //安装首页
    public function index()
    {
        \DB::beginTransaction();
        \Artisan::call('module:migrate');
        //接口客户端
        \Artisan::call('passport:client', ['--password' => true]);
        \DB::commit();
    }
}
