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
        return $this->migrate();
//        try {

//        } catch (\Exception $exception) {
//            dd($exception->getMessage());
//        }
    }

    public function migrate()
    {
        \Artisan::call('module:migrate-reset');
        \Artisan::call('migrate:reset');
        \Artisan::call('migrate', ['--seed' => null]);
        \Artisan::call('module:migrate');
//        \Artisan::call('passport:client', ['--password' => true]);
        return response()->json(['code' => 0, 'message' => "安装表创建成功"]);
    }
}
