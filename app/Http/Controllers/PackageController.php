<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePackageRequest;
use App\Http\Requests\UpdatePackageRequest;
use App\Http\Resources\PackageResource;
use App\Models\Package;

class PackageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum')->except(['index']);
    }

    public function index()
    {
        return PackageResource::collection(Package::all());
    }

    public function store(StorePackageRequest $request, Package $package)
    {
        $package->fill($request->input())->save();
        return new PackageResource($package);
    }

    public function update(UpdatePackageRequest $request, Package $package)
    {
        $package->fill($request->input())->save();
        return new PackageResource($package);
    }

    public function show(Package $package)
    {
        return new PackageResource($package);
    }

    public function destroy(Package $package)
    {
        $this->authorize('delete', $package);
        $package->delete();
        return $this->respondOk('删除成功');
    }
}
