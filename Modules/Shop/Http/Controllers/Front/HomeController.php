<?php

namespace Modules\Shop\Http\Controllers\Front;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

/**
 * 前台首页
 */
class HomeController extends Controller
{
    public function index()
    {
        return view('shop::index');
    }
}
