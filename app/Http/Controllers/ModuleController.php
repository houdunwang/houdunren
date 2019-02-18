<?php

namespace App\Http\Controllers;

use App\Http\Requests\ModuleRequest;
use App\Models\Module;
use App\Repositories\ModuleRepository;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    public function index(ModuleRepository $repository)
    {
        $modules = $repository->all();
        return view('module.index', compact('modules'));
    }

    public function create()
    {
        return view('module.create');
    }

    public function store(ModuleRequest $request, ModuleRepository $repository)
    {
        $repository->create($request->except('_token'));
        return redirect(route('module.index'))->with('success', '模块创建成功');
    }

    public function show(Module $module)
    {

    }

    public function edit(Module $module)
    {
        return view('module.edit', compact('module'));
    }

    public function update(Request $request, Module $module, ModuleRepository $repository)
    {
        $repository->update($module, $request->except('_token', '_method'));
        return redirect(route('module.index'))->with('success', '模块修改成功');
    }

    public function destroy(Module $module,ModuleRepository $repository)
    {
        $repository->delete($module);
        return back()->with('success','模块删除成功');
    }

    public function refresh(Module $module,ModuleRepository $repository){
        $repository->refresh($module);
        return back()->with('success','模块刷新成功');
    }
}
