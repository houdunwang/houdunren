<?php

namespace App\Api;

use App\Http\Resources\ModuleResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Module;
use App\Models\Group;
use ModuleService;
use Auth;
use App\Models\Site;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

/**
 * 模块管理
 * @package App\Http\Controllers\Admin
 */
class ModuleController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Module::class, 'module');
    }

    /**
     * 站点模块
     * @param Site $site
     * @return AnonymousResourceCollection
     */
    public function site(Site $site)
    {
        $modules = ModuleService::siteModules($site);
        return ModuleResource::collection($modules->load('packages'));
    }

    /**
     * 用户站点模块
     * @param Site $site
     * @return AnonymousResourceCollection
     */
    public function userSiteModule(Site $site)
    {
        $modules = ModuleService::userSiteModules($site, Auth::user());
        return ModuleResource::collection($modules->load('packages'));
    }

    /**
     * 当前用户可使用模块
     * @return void
     */
    public function user()
    {
        $modules = Auth::user()->group->modules;
        return ModuleResource::collection($modules->load('packages'));
    }

    /**
     * 模块列表
     * @return void
     */
    public function index()
    {
        if (request('type') == 'installed') {
            return ModuleResource::collection(Module::all());
        }
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
        $name = $request->name;
        $data = ModuleService::config($name, 'config');
        Module::updateOrCreate(['name' => $name], $data);
        return $this->message('模块安装成功');
    }

    /**
     * 卸载模块
     * @param Module $module
     * @return void
     */
    public function destroy(Module $module)
    {
        $this->authorize('delete', $module);
        $module->delete();
        return $this->message('模块卸载成功');
    }
}
