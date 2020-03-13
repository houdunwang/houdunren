<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\ApiController;
use App\Http\Requests\ModuleRequest;
use App\Models\Module;
use App\Services\ModuleServer;
use Illuminate\Http\JsonResponse;

/**
 * 模块管理
 * Class ModuleController
 * @package App\Http\Controllers\System
 */
class ModuleController extends ApiController
{
  public function __construct()
  {
    $this->middleware(['system']);
    $this->authorizeResource(Module::class, 'module');
  }

  /**
   * 获取所有模块包括未安装模块
   * @param ModuleServer $moduleServer
   * @return JsonResponse
   */
  public function index(ModuleServer $moduleServer): JsonResponse
  {
    $modules = $moduleServer->all();
    return $this->success('模块获取成功', $modules);
  }

  /**
   * 安装模块
   * @param ModuleRequest $moduleRequest
   * @param Module $module
   * @return JsonResponse
   */
  public function install(ModuleRequest $moduleRequest, Module $module, ModuleServer $moduleServer)
  {
    $info = $moduleServer->getModuleInfo($moduleRequest->name);
    $module->fill($info['config'])->save();
    return $this->success('模块安装成功');
  }

  /**
   * 卸载模块
   * @param string $name
   * @return JsonResponse
   */
  public function uninstall(string $name): JsonResponse
  {
    $module = Module::where('name', $name)->firstOrFail();
    $module->delete();
    return $this->success('卸载成功');
  }

  /**
   * 所有已经安装模块
   * @param ModuleServer $moduleServer
   * @return JsonResponse
   */
  public function installed(ModuleServer $moduleServer): JsonResponse
  {
    $modules = $moduleServer->allInstalledModule();
    return $this->success('模块获取成功', $modules);
  }
}
