<?php

namespace Modules\Shop\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Shop\Entities\ShopModule;
use Modules\Shop\Entities\ShopPackage;

class PackageController extends Controller
{
    public function index(Request $request)
    {
        $module = ShopModule::find($request->query('id'));
        return view('shop::package.index', compact('module'));
    }

    public function destroy(ShopPackage $package)
    {
        $package->delete();
        return back()->with('success', '删除成功');
    }
}
