<?php
/** .-------------------------------------------------------------------
 * |  Software: [hdcms framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军 <www.aoxiangjun.com>
 * |    WeChat: houdunren2018
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContentModuleRequest;
use App\Models\Module;
use App\Repositories\ModuleRepository;

class ModuleController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin:Admin-module');
    }

    public function index(ModuleRepository $repository)
    {
        $modules = $repository->all();
        return view('admin.module.index', compact('modules'));
    }

    public function edit(Module $module)
    {
        return view('admin.module.edit', compact('module'));
    }

    public function update(ContentModuleRequest $request, Module $module, ModuleRepository $repository)
    {
        $repository->update($module, $request->all());
        return redirect(route('admin.module.index'))->with('success', '模块修改成功');
    }
}