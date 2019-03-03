<?php

namespace Modules\Shop\Http\Controllers\Front;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Shop\Entities\ShopModule;

class BuyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function module(ShopModule $module)
    {
        $module->user()->syncWithoutDetaching([1]);
        return back()->with('success', '模块购买成功');
    }
}
