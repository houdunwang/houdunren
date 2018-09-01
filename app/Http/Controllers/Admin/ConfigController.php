<?php

namespace App\Http\Controllers\Admin;

use App\Servers\ConfigServer;
use Houdunwang\Aliyun\Aliyun;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConfigController extends Controller
{
    public function edit(ConfigServer $configServer, $name)
    {
        Aliyun::config([
            /*
            |--------------------------------------------------------------------------
            | 根据服务器所在区域进行选择
            | https://help.aliyun.com/document_detail/40654.html?spm=5176.7114037.1996646101.1.OCtdEo
            */
            'regionId'  => hd_config('aliyun.regionId'),
            /*
            |--------------------------------------------------------------------------
            | 如果使用主账号访问，登陆阿里云 AccessKey 管理页面创建、查看
            | 如果使用子账号访问，请登录阿里云访问控制控制台查看
            */
            'accessId'  => hd_config('aliyun.accessId'),
            /*
            |--------------------------------------------------------------------------
            | 如果使用主账号访问，登陆阿里云 AccessKey 管理页面创建、查看
            | 如果使用子账号访问，请登录阿里云访问控制控制台查看
            */
            'accessKey' => hd_config('aliyun.accessKey'),
        ]);
        $config = $configServer->get($name);
        return view('config.' . $name, compact('config'));
    }

    public function update(ConfigServer $configServer, Request $request,$name)
    {
        $configServer->save($name, $request->all());
        return back()->with('success', '保存成功');
    }
}
