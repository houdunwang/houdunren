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
  public function __construct()
  {
    $this->middleware('auth:api');
    $this->middleware('system')->except(['show']);
  }

  public function show(SystemConfig $config)
  {
    $data = array_merge(config('hd.system'), $config['config'] ?? []);
    return $this->success('系统配置获取成功', $data);
  }

  public function store(Request $request)
  {
    $config = $request->input();
    if (!empty($config)) {
      $model = SystemConfig::first();
      $model['config'] = $config;
      $model->save();

      return $this->success('更新成功', $model->config);
    }
    return $this->error('参数错误');
  }
}
