<?php

namespace App\Api;

use App\Http\Controllers\Controller;
use App\Models\Module;
use Illuminate\Http\Request;
use App\Models\Site;
use ModuleService;
use App\Http\Resources\ModuleResource;

/**
 * 模块管理
 * @package App\Http\Controllers\Admin
 */
class ModuleController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum', 'system']);
    }

    /**
     * 所有模块列表
     *
     * @return void
     */
    public function index()
    {
        return ModuleService::all();
    }

    /**
     * 获取所有已经安装模块
     *
     * @return void
     */
    public function installed()
    {
        return ModuleResource::collection(Module::all());
    }

    /**
     * 安装模块
     * @param string $name
     * @return void
     */
    public function install(string $name)
    {
        $data = ModuleService::config($name, 'config');
        Module::updateOrCreate(['name' => $name], $data);
        return ['message' => '模块安装成功'];
    }

    /**
     * 卸载模块
     * @param Module $module
     * @return void
     */
    public function uninstall(Module $module)
    {
        $module->delete();
        return ['message' => '模块卸载成功'];
    }
}
