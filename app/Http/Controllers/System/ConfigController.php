<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\ApiController;
use App\Models\SystemConfig;
use Illuminate\Http\Request;

/**
 * 系统配置
 */
class ConfigController extends ApiController
{
  public function __construct()
  {
    $this->middleware(['system'])->except(['show']);
  }

  public function show(SystemConfig $config)
  {
    $data = array_merge(config('hd.system'), $config['config'] ?? []);
    return $this->json($data);
  }

  public function store(Request $request)
  {
    $model = SystemConfig::first();
    $model['config'] = $request->all();
    $model->save();

    return $this->success('更新成功', $model->config);
  }
}
