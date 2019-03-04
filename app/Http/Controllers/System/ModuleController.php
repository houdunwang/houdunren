<?php
/** .-------------------------------------------------------------------
 * |  Software: [hdcms framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军大叔 <www.aoxiangjun.com>
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use App\Http\Requests\ModuleRequest;
use App\Models\Module;
use App\Repositories\ModuleRepository;
use App\Repositories\SiteRepository;
use Illuminate\Http\Request;

/**
 * 模块管理
 * Class ModuleController
 * @package App\Http\Controllers
 */
class ModuleController extends Controller
{
    public function index(ModuleRepository $repository)
    {
        $modules = $repository->all();

        return view('system.module.index', compact('modules'));
    }

    public function create()
    {
        return view('system.module.create');
    }

    public function store(ModuleRequest $request, ModuleRepository $repository, SiteRepository $siteRepository)
    {
        $repository->create($request->except('_token'));
        $siteRepository->loadAllSitePermission();
        return redirect(route('system.module.index'))->with('success', '模块创建成功');
    }

    public function edit(Module $module)
    {
        return view('system.module.edit', compact('module'));
    }

    public function update(
        Request $request,
        Module $module,
        ModuleRepository $repository,
        SiteRepository $siteRepository
    ) {
        $repository->update($module, $request->except('_token', '_method'));
        $siteRepository->loadAllSitePermission();
        return redirect(route('system.module.index'))->with('success', '模块修改成功');
    }

    /**
     * 删除模块
     * @param Module $module
     * @param ModuleRepository $repository
     * @param SiteRepository $siteRepository
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Module $module, ModuleRepository $repository, SiteRepository $siteRepository)
    {
        $repository->delete($module);
        $siteRepository->loadAllSitePermission();
        return back()->with('success', '模块删除成功');
    }

    /**
     * 刷新模块
     * @param Module $module
     * @param ModuleRepository $repository
     * @param SiteRepository $siteRepository
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function refresh(Module $module, ModuleRepository $repository, SiteRepository $siteRepository)
    {
        $repository->refresh($module);
        $siteRepository->loadAllSitePermission();
        return back()->with('success', '模块刷新成功');
    }

    /**
     * 安装本地模块视图
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function local()
    {
        $dirs = \Storage::drive('module')->directories();
        $names = Module::pluck('name') ?? collect();
        $modules = [];
        foreach (array_diff($dirs, $names->toArray()) as $dir) {
            $package = include \Storage::drive('module')->path($dir . '/Config/package.php');
            if ($package['local']) {
                $modules[] = $package;
            }
        }
        return view('system.module.local', compact('modules'));
    }

    /**
     * 安装本地模块
     * @param string $name
     * @param ModuleRepository $repository
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function install(string $name, ModuleRepository $repository)
    {
        $repository->install($name);
        return redirect()->route('system.module.index')->with('success', '模块安装成功');
    }
}
