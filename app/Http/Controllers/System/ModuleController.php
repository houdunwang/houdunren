<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use App\Models\Module;
use App\Services\ModuleService;
use Illuminate\Http\JsonResponse;
use Exception;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Nwidart\Modules\Collection;
use Illuminate\Support\Facades\Storage;

/**
 * 模块管理
 * @package App\Http\Controllers\Admin
 */
class ModuleController extends Controller
{
    /**
     * 所有模块列表
     * @param ModuleService $moduleService
     * @return void
     */
    public function index(ModuleService $moduleService)
    {
        $modules = $moduleService->all();
        return inertia('System/Module/Index', compact('modules'));
    }

    /**
     * 获取所有已经安装模块
     * @param ModuleService $moduleService
     * @return Collection
     */
    public function installed(ModuleService $moduleService)
    {
        $modules = $moduleService->allInstalled();
        return inertia("System/Module/Index", compact('modules'));
    }

    /**
     * 安装模块
     *
     * @param [type] $name
     * @param Module $model
     * @param ModuleService $moduleService
     * @return void
     */
    public function install(string $name, Module $model, ModuleService $moduleService)
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
        return back()->with('success', '模块卸载成功');
    }

    /**
     * 删除模块
     *
     * @param string $name
     * @return void
     */
    public function del(string $name)
    {
        File::deleteDirectory(module_path($name));
        File::deleteDirectory(public_path("modules/{$name}"));
        return back()->with('success', '模块卸载成功');
    }
}
