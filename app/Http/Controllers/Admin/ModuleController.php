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
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $modules = Module::get();
        return view('admin.module.index', compact('modules'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Module $module)
    {
        //
    }

    public function edit(Module $module)
    {
        return view('admin.module.edit', compact('module'));
    }

    public function update(ContentModuleRequest $request, Module $module)
    {
        $module->update($request->all());
        return redirect(route('admin.module.index'))->with('success', '模块修改成功');
    }

    public function destroy(Module $module)
    {
        //
    }
}
