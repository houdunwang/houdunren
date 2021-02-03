<?php

namespace App\Api;

use App\Http\Resources\ModuleResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Module;
use App\Models\User;
use App\Models\Site;
use ModuleService;
use Auth;

/**
 * 模块管理
 * @package App\Http\Controllers\Admin
 */
class ModuleController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum', 'system']);
        $this->authorizeResource(Module::class, 'module');
    }

    /**
     * 模块列表
     * @return void
     */
    public function index()
    {
        return ModuleService::all();
    }

    /**
     * 获取模块
     * @param Module $module
     * @return void
     */
    public function show(Module $module)
    {
        return new ModuleResource($module);
    }

    /**
     * 安装模块
     * @param string $name
     * @return void
     */
    public function store(Request $request)
    {
        sleep(3);
        $name = $request->name;
        $data = ModuleService::config($name, 'config');
        Module::updateOrCreate(['name' => $name], $data);
        return ['message' => '模块安装成功'];
    }

    /**
     * 卸载模块
     * @param Module $module
     * @return void
     */
    public function destroy(Module $module)
    {
        sleep(3);
        $this->authorize('delete', $module);
        $module->delete();
        return ['message' => '模块卸载成功'];
    }
}
