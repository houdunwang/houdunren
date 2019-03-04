<?php

namespace Modules\Shop\Http\Controllers\Front;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Shop\Entities\ShopModule;

class ModuleController extends Controller
{
    public function index()
    {
        $modules = ShopModule::paginate(10);
        return view('shop::front.module.index', compact('modules'));
    }

    public function show(ShopModule $module)
    {
        return view('shop::front.module.show', compact('module'));
    }
}
