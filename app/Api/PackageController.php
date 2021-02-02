<?php

namespace App\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PackageRequest;
use App\Http\Resources\PackageResource;
use App\Models\Package;
use Illuminate\Http\Request;
use Auth;

/**
 * 服务套餐
 * @package App\Http\Controllers\System
 */
class PackageController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum', 'system']);
    }

    /**
     * 套餐列表
     * @return void
     */
    public function index()
    {
        return PackageResource::collection(Package::all());
    }

    /**
     * 获取套餐
     *
     * @param Package $package
     * @return void
     */
    public function show(Package $package)
    {
        return new PackageResource($package);
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
        return ['message' => '套餐添加成功'];
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
        return ['message' => '套餐修改成功'];
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
            return response(['message' => '系统套餐不允许删除'], 403);
        }
        $package->delete();
        return ['message' => '套餐删除成功'];
    }
}
