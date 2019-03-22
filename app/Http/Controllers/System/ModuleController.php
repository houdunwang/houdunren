<?php
/** .-------------------------------------------------------------------
 * |  Software: [hdcms framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军大叔 <www.aoxiangjun.com>
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace App\Http\Controllers\System;

use App\Exceptions\ResponseHttpException;
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
    /**
     * @param ModuleRepository $repository
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(ModuleRepository $repository)
    {
        $modules = $repository->all();

        return view('system.module.index', compact('modules'));
    }

    /**
     * 新增模块
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('system.module.create');
    }

    /**
     * 保存新增
     * @param ModuleRequest $request
     * @param ModuleRepository $repository
     * @param SiteRepository $siteRepository
     * @return \Illuminate\Http\RedirectResponse
     * @throws \App\Exceptions\ResponseHttpException
     */
    public function store(ModuleRequest $request, ModuleRepository $repository, SiteRepository $siteRepository)
    {
        $module = ucfirst($request->input('name'));
        if (is_dir(\Storage::drive('module')->path($module))) {
            return back()->with('error', '模块已经存在')->withInput();
        }
        $repository->create($request->except('_token'));
        $siteRepository->loadAllSitePermission();
        return redirect(route('system.module.local'))->with('success', '模块创建成功');
    }

    /**
     * 修改模块
     * @param Module $module
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Module $module)
    {
        return view('system.module.edit', compact('module'));
    }

    /**
     * 更新模块
     * @param ModuleRequest $request
     * @param Module $module
     * @param ModuleRepository $repository
     * @param SiteRepository $siteRepository
     * @return \Illuminate\Http\RedirectResponse
     * @throws \App\Exceptions\ResponseHttpException
     */
    public function update(
        ModuleRequest $request,
        Module $module,
        ModuleRepository $repository,
        SiteRepository $siteRepository
    ) {
        $repository->update($module, $request->except('_token', '_method'));
        $siteRepository->loadAllSitePermission();
        return redirect(route('system.module.index'))->with('success', '模块修改成功');
    }

    /**
     * 删除模块数据不删除文件
     * @param Module $module
     * @param ModuleRepository $repository
     * @param SiteRepository $siteRepository
     * @return ResponseHttpException|\Illuminate\Http\RedirectResponse
     */
    public function destroy(Module $module, ModuleRepository $repository, SiteRepository $siteRepository)
    {
        try {
            $repository->delete($module);
            $siteRepository->loadAllSitePermission();
            return back()->with('success', '模块删除成功');
        } catch (\Exception $exception) {
            return new ResponseHttpException($exception->getMessage());
        }
    }

    /**
     * 删除本地所有模块文件
     * @param string $name
     * @return ResponseHttpException|\Illuminate\Http\RedirectResponse
     */
    public function delete(string $name)
    {
        try {
            \Storage::drive('module')->deleteDirectory($name);
            \Storage::drive('base')->deleteDirectory("public/modules/{$name}");
            return back()->with('success', '模块所有文件删除成功');
        } catch (\Exception $exception) {
            return new ResponseHttpException($exception->getMessage());
        }
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
            $file = \Storage::drive('module')->path($dir . '/Config/package.php');
            if (is_file($file) && ($package = include $file)) {
                if ($package['local']) {
                    $modules[] = $package;
                }
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
