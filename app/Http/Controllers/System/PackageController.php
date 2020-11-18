<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use App\Http\Requests\PackageRequest;
use App\Models\Package;
use App\Services\ModuleService;
use Illuminate\Http\Request;

class PackageController extends Controller
{
  public function index()
  {
    return view('system.package.index', ['packages' => Package::all()]);
  }

  public function create(ModuleService $moduleService)
  {
    $modules = $moduleService->allInstalled()->values();

    return view('system.package.create', compact('modules'));
  }

  public function store(PackageRequest $request)
  {
    $package = Package::create($request->input());
    $package->modules()->sync($request->input('modules'));
    $package->templates()->sync($request->input('templates'));

    return redirect()
      ->route('system.package.index')
      ->with('success', '套餐添加成功');
  }

  public function edit(Package $package, ModuleService $moduleService)
  {
    $modules = $moduleService->allInstalled()->values();
    return view('system.package.edit', compact('package', 'modules'));
  }

  public function update(PackageRequest $request, Package $package)
  {
    $package->fill($request->input())->save();
    $package->modules()->sync($request->input('modules'));

    $package->templates()->sync($request->input('templates'));

    return redirect()
      ->route('system.package.index')
      ->with('success', '套餐修改成功');
  }

  public function destroy(Package $package)
  {
    if ($package->id == 1) {
      abort('403', '系统套餐不允许删除');
    }
    $package->delete();
    return response()->json(['message' => '删除成功']);
  }
}
