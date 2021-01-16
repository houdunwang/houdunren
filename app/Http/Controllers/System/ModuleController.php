<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use App\Models\Module;
use Illuminate\Http\Request;
use File;
use ModuleService;

/**
 * 模块管理
 * @package App\Http\Controllers\Admin
 */
class ModuleController extends Controller
{
    /**
     * 所有模块列表
     * @return void
     */
    public function index()
    {
        $modules = ModuleService::all();
        return inertia('System/Module/Index', compact('modules'));
    }

    /**
     * 获取所有已经安装模块
     *
     * @return void
     */
    public function installed()
    {
        $modules = ModuleService::allInstalled();
        return inertia("System/Module/Index", compact('modules'));
    }

    /**
     * 安装模块
     *
     * @param string $name
     * @param Module $model
     * @return void
     */
    public function install(string $name, Module $model)
    {
        $model->create(ModuleService::find($name));

        return back()->with('success', '模块安装成功');
    }

    /**
     * 卸载模块
     *
     * @param Module $module
     * @return void
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
