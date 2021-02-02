<?php

namespace App\Api;

use App\Http\Resources\ModuleResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Module;
use App\Models\User;
use App\Models\Site;
use ModuleService;

/**
 * 模块管理
 * @package App\Http\Controllers\Admin
 */
class ModuleController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum']);
        $this->middleware(['system'])->except(['user', 'site']);
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
     * 站点模块
     *
     * @param Site $site
     * @return void
     */
    public function site(Site $site)
    {
        return $site->modules;
    }

    /**
     * 用户所拥有的站点模块
     *
     * @param User $user
     * @return void
     */
    public function user(User $user)
    {
        return ModuleResource::collection($user->group->modules);
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
