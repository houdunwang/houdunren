<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Module;
use App\Services\ModuleService;
use Illuminate\Http\JsonResponse;
use Exception;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Nwidart\Modules\Collection;

class ModuleController extends Controller
{
  /**
   * 所有模块列表
   * @param ModuleService $moduleService
   * @return View|Factory
   * @throws BindingResolutionException
   */
  public function index(ModuleService $moduleService)
  {
    $modules = $moduleService->all();
    return view('module.index', compact('modules'));
  }

  /**
   * 获取所有已经安装模块
   * @param ModuleService $moduleService
   * @return Collection
   */
  public function installed(ModuleService $moduleService)
  {
    return $moduleService->allInstalled();
  }

  /**
   * 安装模块
   */
  public function install($name, Module $model, ModuleService $moduleService)
  {
    $model->create($moduleService->find($name));

    return back()->with('success', '模块安装成功');
  }

  /**
   * 卸载模块
   * @param Module $module
   * @return JsonResponse
   * @throws Exception
   * @throws BindingResolutionException
   */
  public function uninstall(Module $module)
  {
    $module->delete();
    return response()->json(['message' => '模块删除成功']);
  }
}
