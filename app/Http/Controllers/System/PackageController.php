<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use App\Http\Requests\PackageRequest;
use App\Models\Package;
use App\Repositories\ModuleRepository;
use App\Repositories\PackageRepository;

class PackageController extends Controller
{
    public function index(PackageRepository $repository)
    {
        $packages = $repository->all();
        return view('system.package.index', compact('packages'));
    }

    public function create(Package $package)
    {
        return view('system.package.create',compact('package'));
    }

    public function store(PackageRequest $request, PackageRepository $repository)
    {
        $repository->create($request->input());
        return redirect()->route('system.package.index')->with('success', '保存成功');
    }

    public function show(Package $package)
    {
    }

    public function edit(Package $package, ModuleRepository $moduleRepository)
    {
        $modules = $moduleRepository->all();
        return view('system.package.edit', compact('package', 'modules'));
    }

    public function update(PackageRequest $request, Package $package, PackageRepository $repository)
    {
        $repository->update($package, $request->input());
        return redirect(route('system.package.index'))->with('success', '更新成功');
    }

    public function destroy(Package $package, PackageRepository $repository)
    {
        $this->authorize('delete', $package);
        $repository->delete($package);
        return back()->with('success', '套餐删除成功');
    }
}
