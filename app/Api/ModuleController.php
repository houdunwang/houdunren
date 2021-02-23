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
use DB;

/**
 * 模块管理
 * @package App\Http\Controllers\Admin
 */
class ModuleController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum']);
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
     * 用户可使用模块
     * @return void
     */
    public function user(Site $site)
    {
        return ModuleResource::collection(Auth::user()->group->modules);
    }

    /**
     * 用户站点模块
     * @return void
     */
    public function userSiteModule(Site $site)
    {
        $modules = ModuleService::userSiteModules($site, Auth::user());
        return ModuleResource::collection($modules->load('packages'));
    }

    /**
     * 所有模块列表
     * @return void
     */
    public function index()
    {
        return ModuleService::all();
    }

    /**
     * 已安装模块列表
     * @return AnonymousResourceCollection
     */
    public function installed()
    {
        return ModuleResource::collection(Module::all());
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
    public function install(Request $request)
    {
        $this->authorize('install', Module::class);
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
    public function uninstall(Module $module)
    {
        $this->authorize('install', $module);
        DB::beginTransaction();
        $this->authorize('delete', $module);
        $module->delete();
        DB::commit();
        return $this->message('模块卸载成功');
    }
}
