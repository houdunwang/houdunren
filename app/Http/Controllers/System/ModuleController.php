<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\ApiController;
use App\Http\Requests\ModuleRequest;
use App\Models\Module;
use App\Servers\ModuleServer;
use Illuminate\Http\Request;

/**
 * 模块管理
 * Class ModuleController
 * @package App\Http\Controllers\System
 */
class ModuleController extends ApiController
{
  public function __construct()
  {
    $this->authorizeResource(Module::class, 'module');
  }

  public function index(ModuleServer $moduleServer): array
  {
    return $moduleServer->all();
  }

  public function install(ModuleRequest $moduleRequest, Module $module)
  {
    $module['name'] = $moduleRequest->name;
    $module->save();

    return $this->success('模块安装成功');
  }

  public function uninstall(string $name)
  {
    $module = Module::where('name', $name)->firstOrFail();
    $module->delete();
    return $this->success('卸载成功');
  }
}
