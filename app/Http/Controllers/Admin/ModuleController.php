<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Module;
use App\Services\ModuleService;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    public function index(ModuleService $moduleService)
    {
        $modules = $moduleService->all();
        return view('module.index', compact('modules'));
    }

    public function install($name, Module $model, ModuleService $moduleService)
    {
        $model->create($moduleService->find($name));

        return back()->with('success', '模块安装成功');
    }

    public function uninstall(Module $module)
    {
        $module->delete();
        return response()->json(['message' => '模块删除成功']);
    }
}
