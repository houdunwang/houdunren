<?php

namespace Modules\Shop\Http\Controllers\Member;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Shop\Entities\ShopModule;
use Modules\Shop\Entities\ShopPackage;

/**
 * 压缩包管理
 * Class PackageController
 * @package Modules\Shop\Http\Controllers\Member
 */
class PackageController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $module = ShopModule::find($request->query('id'));
        return view('shop::member.package.index', compact('module'));
    }

    /**
     * @param ShopPackage $package
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(ShopPackage $package)
    {
        $package->delete();
        return back()->with('success', '压缩包删除成功');
    }
}
