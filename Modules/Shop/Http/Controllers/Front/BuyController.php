<?php

namespace Modules\Shop\Http\Controllers\Front;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Shop\Entities\ShopModule;

/**
 * 购买模块模板
 * Class BuyController
 * @package Modules\Shop\Http\Controllers\Front
 */
class BuyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function module(ShopModule $module)
    {
        $module->users()->syncWithoutDetaching([auth()->id()]);
        return redirect(module_link('shop.front.module.show',$module))->with('success', '模块购买成功');
    }
}
