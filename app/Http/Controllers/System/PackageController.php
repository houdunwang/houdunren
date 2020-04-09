<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\ApiController;
use App\Http\Requests\PackageRequest;
use App\Http\Resources\PackageResource;
use App\Models\Package;
use Illuminate\Http\Request;

/**
 * 套餐管理
 * @package App\Http\Controllers\System
 */
class PackageController extends ApiController
{
    public function __construct()
    {
        $this->authorizeResource(Package::class, 'package');
    }

    public function index()
    {
        return PackageResource::collection(Package::latest()->get());
    }

    public function store(PackageRequest $request, Package $package)
    {
        $package->fill($request->all())->save();
        $package->module()->sync($request->input('modules', []));
        return $this->success('套餐添加成功');
    }

    public function show(Package $package)
    {
        return $this->json(new PackageResource($package));
    }

    public function update(PackageRequest $request, Package $package)
    {
        $package->fill($request->all())->save();
        $package->module()->sync($request->input('modules', []));
        return $this->success('套餐修改成功', $package);
    }

    public function destroy(Package $package)
    {
        if ($package->system) {
            return $this->error("系统套餐不允许删除");
        }
        $package->delete();
        return $this->success('套餐删除成功');
    }
}
