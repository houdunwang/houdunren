<?php

namespace App\Http\Controllers;

use App\Http\Requests\PackageRequest;
use App\Models\Package;
use App\Repositories\ModuleRepository;
use App\Repositories\PackageRepository;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function index(PackageRepository $repository)
    {
        $packages = $repository->all();
        return view('package.index', compact('packages'));
    }

    public function create(Package $package)
    {
        return view('package.create',compact('package'));
    }

    public function store(PackageRequest $request, PackageRepository $repository)
    {
        $repository->create($request->input());
        return redirect()->route('package.index')->with('success', '保存成功');
    }

    public function show(Package $package)
    {
    }

    public function edit(Package $package, ModuleRepository $moduleRepository)
    {
        $modules = $moduleRepository->all();
        return view('package.edit', compact('package', 'modules'));
    }

    public function update(PackageRequest $request, Package $package, PackageRepository $repository)
    {
        $repository->update($package, $request->input());
        return redirect(route('package.index'))->with('success', '更新成功');
    }

    public function destroy(Package $package, PackageRepository $repository)
    {
        $this->authorize('delete', $package);
        $repository->delete($package);
        return back()->with('success', '套餐删除成功');
    }
}
