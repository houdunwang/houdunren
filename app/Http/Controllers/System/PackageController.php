<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use App\Http\Requests\PackageRequest;
use App\Http\Resources\PackageResource;
use App\Models\Package;
use App\Services\ModuleService;
use Illuminate\Http\Request;

/**
 * 套餐管理
 */
class PackageController extends Controller
{
    public function index()
    {
        $packages  = PackageResource::collection(Package::all());
        return inertia()->render('System/Package/Index', compact('packages'));
    }

    /**
     * 添加套餐
     *
     * @param ModuleService $moduleService
     * @return void
     */
    public function create(ModuleService $moduleService)
    {
        $modules = $moduleService->allInstalled();
        return inertia('System/Package/Form', compact('modules'));
    }

    /**
     * 保存套餐
     *
     * @param PackageRequest $request
     * @return void
     */
    public function store(PackageRequest $request)
    {
        $package = Package::create($request->input());
        $package->modules()->sync($request->input('modules'));
        $package->templates()->sync($request->input('templates'));

        return redirect()->route('system.package.index')->with('success', '套餐添加成功');
    }

    /**
     * 编辑套餐
     *
     * @param Package $package
     * @param ModuleService $moduleService
     * @return void
     */
    public function edit(Package $package, ModuleService $moduleService)
    {
        $modules = $moduleService->allInstalled();
        return inertia('System/Package/Form', ['modules' => $modules, 'package' => new PackageResource($package)]);
    }

    /**
     * 更新套餐
     *
     * @param PackageRequest $request
     * @param Package $package
     * @return void
     */
    public function update(PackageRequest $request, Package $package)
    {
        $package->fill($request->input())->save();
        $package->modules()->sync($request->input('modules'));
        $package->templates()->sync($request->input('templates'));

        return redirect()->route('system.package.index')->with('success', '套餐修改成功');
    }

    /**
     * 删除套餐
     *
     * @param Package $package
     * @return void
     */
    public function destroy(Package $package)
    {
        if ($package->id == 1) {
            return back()->with('message', '系统套餐不允许删除');
        }
        $package->delete();
        return back()->with('success', '删除成功');
    }
}
