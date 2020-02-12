<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\ApiController;
use App\Models\SystemConfig;
use Illuminate\Http\Request;

/**
 * 系统配置
 */
class SystemConfigController extends ApiController
{
    public function index(SystemConfig $systemConfig)
    {
        $config = $systemConfig->first()->config;
        return  $this->success('系统配置获取成功', $config);
    }

    public function store(Request $request)
    {
        $config = $request->input('data');
        $model =  SystemConfig::first();
        $model['config'] = $config;
        $model->save();
        return $this->success('更新成功', $model->config);
    }
}
